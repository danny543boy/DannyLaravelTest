<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//gsArAc2zxhtOLLGkBsCmChDHnHMt3oQAJeNl7Cci769499c4
Route::middleware('auth:sanctum')->get('/posts', function (Request $request) {
    $posts = Post::all();
    return response()->json($posts);
});

Route::middleware('auth:sanctum')->post('/posts', function (Request $request) {
    $title = $request->input('title');
    $content = $request->input('content');

    $post = Post::query()->create([
        'title' => $title,
        'content' => $content,
    ]);
    return response()->json($post, 201);
});
