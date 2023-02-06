<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ResponseController;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/', '/post');
Route::redirect('/home', '/post');

//POST
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{post}/show', [PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/post/response/{post_id}', [ResponseController::class, 'create'])->name('response.create');
Route::post('/post/response/{post_id}', [ResponseController::class, 'store'])->name('response.store');