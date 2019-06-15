<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded = ['id'];

    public static function scopeGetLastTree($query)
    {
//        return Article::latest()->take(3)->get();
        return $query->latest()->take(3)->get()->pluck('title');
        return $query->latest()->take(3)->get();
    }
}
