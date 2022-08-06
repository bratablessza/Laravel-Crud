<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Users;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session as FacadesSession;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Illuminate\Support\Str;
use Nette\Utils\Paginator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_form()
    {
        //dd('users index method on controller');
        //echo 'Login form';
        return View('Login');
    }

    // POST
    public function login_action(Request $request)
    {
        // Validation
        // dd($request); //dd itu untu troubleshoot
        //return View('Login');

        $users = Users::where('username', $request->username)->first();
        if ($users == null) {
            return redirect()->back()->with('message', 'maaf anda tidak terdaftar, silahkan register terlebih dahulu');
        }
        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);
        //->where('password' , $request->);
        if ($hashed_password) {
            //kirim token dulu 
            $users->token = Str::random(20);
            $users->save();
            //panggil session
            $request->session()->put('token', $users->token);
            //sudah dipanggil
            return to_route('dashboard_index');
        } else {
            return redirect()->back()->with('message', 'maaf anda tidak terdaftar');
        }
    }

    public function dashboard_index()
    {
        // nangkep session dulu 

        if (FacadesSession::has('token')) {
            $users = Users::where('token', FacadesSession::get('token'))->first();
            $articles = Articles::paginate(3);
            //$articles->paginate(15);
            return View('Dashboard/index', [
                "title" => "Welcome back, " . $users->username, "users" => $users, 'articles' => $articles
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }

    public function dashboard_logout(Request $request)
    {
        Users::where('token', $request->token)->update([
            'token' => NULL //clear session token di DB
        ]);
        FacadesSession::pull('token'); //clear session token di web Session
        return to_route('login_form');
    }


    public function article_delete_action(Request $request)
    {
        Articles::find($request->id)->delete();
        return redirect()->back()->with('message', 'Article berhasil dihapus');
    }

    public function article_add_action(Request $request)
    {

        $request->validate([
            'title' => ['required', 'max:255', 'min:3'],
            'description' => ['required', 'min:8'],
            'tag' => ['nullable'],
        ]);


        $created = Articles::create([
            "title" => $request->title,
            "description" => $request->description,
            "tag" => $request->tag,
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'artikel berhasil dibuat');
        } else {
            return redirect()->back()->with('message', 'artikel gagal dibuat');
        }
    }

    public function article_edit_detail($id)
    {
        return View('editArticle', [
            'title' => 'Edit Article dari ID  ' . $id, 'article' => Articles::find($id)
        ]);
    }

    public function article_edit_action(Request $request)
    {

        Articles::where('id', $request->id)->update([
            'title' => $request->title, 'description' => $request->description, 'tag' => $request->tag
        ]);
        return redirect('dashboard')->with('message', 'Article berhasil diedit');
    }

    public function signUpAction(Request $request)
    {

        $usernameInputan = $request->usernameInputan;
        $passwordInputan = $request->passwordInputan;
        $dataUser = Users::where([
            'username' => $usernameInputan
        ])->first();
        //cek data null atau tidak
        //cek username
        //cek password (kalo data yang usernamenya tidak null)
        // else itu add Data new user
        if ($dataUser != null) {
            $passDataUser = $dataUser->password;
            $cekPass = Hash::check($request->passwordInputan, $passDataUser);
            if ($cekPass) {
                return redirect()->back()->with('messageError', 'Failed , Account already Exist cuy');
            } else if ($dataUser->username && (!$cekPass)) {
                return redirect()->back()->with('messageError', 'Failed , Username Account already Exist cuy');
            } else {
                try {
                    $NewPassWithCrypt = bcrypt($passwordInputan);
                    $addData = Users::create([
                        "username" => $usernameInputan,
                        "password" => $NewPassWithCrypt
                    ]);
                } catch (Exception $err) {
                    return redirect()->back()->with('messageError', 'Failed , Trouble when adding Account cuy' . $err->getMessage());
                }

                if ($addData) {
                    return redirect()->back()->with('messageSuccess', 'Success , Account already inserted cuy, gas Login');
                } else {
                    return redirect()->back()->with('messageError', 'Failed , Trouble when adding Account cuy');
                }
            }
        } else {
            try {
                $NewPassWithCrypt = bcrypt($passwordInputan);
                $addData = Users::create([
                    "username" => $usernameInputan,
                    "password" => $NewPassWithCrypt
                ]);
            } catch (Exception $err) {
                return redirect()->back()->with('messageError', 'Failed , Trouble when adding Account cuy' . $err->getMessage());
            }

            if ($addData) {
                return redirect()->back()->with('messageSuccess', 'Success , Account already inserted cuy, gas Login');
            } else {
                return redirect()->back()->with('messageError', 'Failed , Trouble when adding Account cuy');
            }
        }
    }

    public function get_user_profile($id)
    {
        return View('userProfile', [
            'title' => 'View Profile dari ID  ' . $id, 'users' => Users::find($id)
        ]);
    }
}
