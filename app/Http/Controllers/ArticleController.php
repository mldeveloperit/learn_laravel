<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    /*public function index($id)
    {
//        dd(\App\Article::find($id)->get()->pluck('title'));
        dd(\App\Article::where('id',$id)->get()->pluck('title'));
        return;
    }*/

    public function index()
    {
//        $articles = Article::all();
        return csrf_token();
        $articles = Article::latest()->take(3)->get();
        return $articles;
        return view('article/list', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function showSlug($article)
    {
        return view('article.show', compact('article'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store()
    {
        Article::create([
            'title' => request('title'),
            'slug' => request('title'),
            'body' => request('body'),
            'user_id' => 3,
        ]);
        return redirect('/articles');
    }
}
