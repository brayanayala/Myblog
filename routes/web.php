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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index']);

Route::get('posts', [App\Http\Controllers\PostController::class, 'index']);
Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create']);
Route::get('posts/{post}', [App\Http\Controllers\PostController::class, 'show']);
Route::post('posts', [App\Http\Controllers\PostController::class, 'store']);
Route::get('posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit']);
Route::patch('posts/{post}', [App\Http\Controllers\PostController::class, 'update']);
Route::delete('posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');