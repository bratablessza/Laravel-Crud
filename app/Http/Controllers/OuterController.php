<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Users;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index()
    {
        $articles = Articles::get();
        return View(
            'home',
            [
                'title' => "INI JUDUL",
                'articles' => $articles
            ]
        );
    }

    public function article_detail($id)
    {

        return View('article', [
            'title' => 'Article detail dari ID  ' . $id, 'article' => Articles::find($id)
        ]);
    }
}
