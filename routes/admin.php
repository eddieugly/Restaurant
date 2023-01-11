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

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/', function(){

        return view('layouts.backend');

    });

    // Category Routes

    Route::resource('/category', \App\Http\Controllers\CategoryController::class, ['names' => 'category']);


    // Menu Routes

    Route::resource('/menu', \App\Http\Controllers\MenuController::class, ['names' => 'menu']);

});


