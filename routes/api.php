<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Resources\PostResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth.basic')->get('/user1', function (Request $request) {
    return $request->user();
});
Route::middleware('auth.basic')->get('/posts/{id}', function ($id) {
    return new PostResource(Post::findOrFail($id));
});
Route::middleware('auth.basic')->get('/posts', function () {
    return PostResource::collection(Post::all());
});
Route::middleware('auth.basic')->post('/posts', function(Request $request) {
    return Post::create($request->all);
});
Route::middleware('auth.basic')->put('/posts/{id}', function(Request $request, $id) {
    $post = Post::findOrFail($id);
    $post->update($request->all());

    return $post;
});
Route::middleware('auth.basic')->delete('/posts/{id}', function($id) {
    Post::find($id)->delete();

    return 204;
});
