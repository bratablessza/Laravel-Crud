<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome', ['title' => 'INI Value dari web.php'], ['desc' => 'Ini bagian deskripsi ']);
// });

// index homepage

Route::controller(OuterController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/article/{id}', 'article_detail')->name('article_detail');
});
// User validation
Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'login_form')->name('login_form');
    Route::post('/login', 'login_action')->name('login_action');

    Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
    Route::post('/logout', 'dashboard_logout')->name('dashboard_logout');

    Route::post('/article/delete', 'article_delete_action')->name('article_delete_action');
    Route::post('/article/add', 'article_add_action')->name('article_add_action');
    Route::get('/article/edit/{id}', 'article_edit_detail')->name('article_edit_detail');
    Route::post('/article/post-edit/', 'article_edit_action')->name('article_edit_action');

    Route::post('/signUp', 'signUpAction')->name('signUpAction');

    Route::get('/userProfile/{id}', 'get_user_profile')->name('get_user_profile');
});
