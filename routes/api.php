<?php

use App\Http\Controllers\PostController;
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

Route::post('post', [PostController::class, 'create']);
Route::put('update', [PostController::class, 'update']);
Route::get('post', [PostController::class, 'get_all']);
Route::get('post/{id}', [PostController::class, 'get_by_id']);
Route::delete('post/{id}', [PostController::class, 'delete']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
