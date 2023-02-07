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

//Post
Route::prefix('post')->name('post.')->group(function () {
Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('{post}/show', [PostController::class, 'show'])->name('show');
Route::get('create', [PostController::class, 'create'])->name('create')->middleware('auth');
Route::post('store', [PostController::class, 'store'])->name('store')->middleware('auth');
});

// Response
Route::middleware('auth')->prefix('post')->name('response.')->group(function () {
    Route::get('response/{post_id}', [ResponseController::class, 'create'])->name('create');
    Route::post('response/{post_id}', [ResponseController::class, 'store'])->name('store');
});