<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Article $article)
    {
        $this->validate(request(), [
            'name' => 'required',
            'body' => 'required|min:10',
        ]);


        $article->comments()->create([
            'name' => request()->name,
            'body' => request()->body
        ]);

        return back();
    }

}
