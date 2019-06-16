<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
//        return csrf_token();
        $articles = Article::latest()->take(3)->get();
//        return $articles;
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

    public function store(StoreArticle $request)
    {
        // Laravel 5.8
        /*$validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);*/


        /*$this->validate($request, [
            'title' => 'required'
        ]);*/

        $request->validate();

        /*$validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('article/create')
                ->withErrors($validator)
                ->withInput();
        }*/


        Article::create([
            'title' => request('title'),
            'slug' => request('title'),
            'body' => request('body'),
            'user_id' => 3,
        ]);
        return redirect('/articles');
    }
}
