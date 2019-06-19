<?php

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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info/{name}/{family}', function ($name, $family) {
    return 'Hello ' . $name . ' ' . $family;
});

Route::get('/info_page/{name}/{family}/{place?}', function ($name, $family, $place = 'qazvin') {
//    return view('info')->with('name' , $name)->with('family', $family);

//    $info = ['name' => $name, 'family' => $family];
//    return view('info', compact('info'));

    $info = ['name' => $name, 'family' => $family, 'place' => $place];
    return view('info', $info);
});

Route::get('/users', function() {
    $users = DB::table('users')->get();
    return $users;
});

/*Route::get('/user/{id}', function($id) {
    $user = DB::table('users')->where('id', $id)->get();
    $user = DB::table('users')->find($id);
    $user = \App\User::all();
    $user = \App\User::pluck('email');
    $user = \App\User::where('id', '>', 5)->get(); // question : how to combine pluck & where?
    $user = \App\User::where('id', '>', 5)->orderBy('name', 'desc')->get();
    $user = \App\User::where('id', 5)->first(); // question : why this return full object?
    $user = \App\User::find($id); // question : why this return full object?
    dd($user);
});*/

Route::get('/user/column/{name}', function($column) {
    $names = DB::table('users')->pluck($column, 'email');
    return view('user_list', compact('names'));
});

/*Route::get('articles', function (){
    dd(\App\Article::getLastTree());
    return;
});*/

/*Route::get('article/create', function (){
    dd('123');
    return;
});*/


Route::get('users', 'UserController@index');
Route::get('user/{id}', 'UserController@show')->name('user.show');

Route::get('articles', 'ArticleController@index');
Route::get('article/create', 'ArticleController@create')->name('article.create');
Route::get('article/{article}', 'ArticleController@show')->name('article.show'); // Route model implicit binding
Route::get('article/slug/{articleSlug}', 'ArticleController@showSlug')->name('article.showSlug'); // Route model explicit binding
Route::post('article', 'ArticleController@store')->name('article.store');
