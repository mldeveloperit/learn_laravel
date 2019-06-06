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

Route::get('/user', function() {
    $users = DB::table('users')->get();
    return $users;
});

Route::get('/user/{id}', function($id) {
    $user = DB::table('users')->find($id);
    dd($user);
});

Route::get('/user/column/{name}', function($column) {
    $names = DB::table('users')->pluck($column, 'email');
    return view('user_list', compact('names'));
});