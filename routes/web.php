<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::post('/reserve', [App\Http\Controllers\HomeController::class, 'reserve'])->name('reserve');

Route::get('/gallery/{type}', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');

Route::get('/blogs', [App\Http\Controllers\HomeController::class, 'blog'])->name('allblogs');

Route::get('/blog/{blog}', [App\Http\Controllers\HomeController::class, 'getBlog'])->name('get.blog');

Route::get('/category/blog/{id}', [App\Http\Controllers\HomeController::class, 'getCategoryBlogs'])->name('category.blog');
