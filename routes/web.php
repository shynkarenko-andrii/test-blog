<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/post', [Controllers\Post::class, 'index']);
Route::get('/', [Controllers\PostController::class, 'index'])->name('index');
Route::get('/posts/{id}', [Controllers\PostController::class, 'show'])->middleware('auth')->name('post.show');
Route::get('/posts/{id}/edit', [Controllers\PostController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::get('/posts/{id}/delete', [Controllers\PostController::class, 'delete'])->middleware('auth')->name('post.delete');


//Route::patch('/editpost/{id}', [Controllers\PostController::class, 'update'])->name('edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [Controllers\PostController::class, 'create'])->name('create');
Route::post('/store', [Controllers\PostController::class, 'store'])->name('store');

//Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function (){
//    Route::get('/create', [Controllers\PostController::class, 'create'])->name('create');
//    Route::post('/','PostController@store')->name('posts.store');
//    Route::get('/','PostController@index')->name('posts.list');
//    Route::get('edit/{slug}','PostController@edit')->name('posts.edit');
//    Route::post('{slug}','PostController@update')->name('posts.update');
//});
