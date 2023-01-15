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

    // Service Routes

    Route::resource('/service', \App\Http\Controllers\ServiceController::class, ['names' => 'service']);

    // Staff Routes

    Route::resource('/staff', \App\Http\Controllers\StaffController::class, ['names' => 'staff']);

    // Blog Routes

    Route::resource('/blog', \App\Http\Controllers\BlogController::class, ['names' => 'blog']);

    // Galler Routes

    Route::resource('/gallery', \App\Http\Controllers\GalleryController::class, ['names' => 'gallery']);

    // Slider Routes

    Route::resource('/slider', \App\Http\Controllers\SliderController::class, ['names' => 'slider']);
    
    // Slider Routes

    Route::get('/reservation', [App\Http\Controllers\ReserveController::class, 'index'])->name('admin.reserve');

    Route::get('/reservation/{type}/{reserve}', [App\Http\Controllers\ReserveController::class, 'confirmation'])->name('admin.reserve.confirmation');

    Route::delete('/reservation/{reserve}', [App\Http\Controllers\ReserveController::class, 'delete'])->name('admin.reserve.delete');

});


