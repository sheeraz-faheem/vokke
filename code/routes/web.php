<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/kangaroo', function() {
    return view('kangaroo/list');
});

Route::get('/kangaroo/{id}/update', function() {
    return view('kangaroo/update');
});

Route::get('/kangaroo/add', function() {
    return view('kangaroo/add');
});
