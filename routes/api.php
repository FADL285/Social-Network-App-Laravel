<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Friend\UnFriendController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Friend\SendFriendController;
use App\Http\Controllers\Friend\AcceptFriendController;
use App\Http\Controllers\Friend\FriendRequestsController;
use App\Http\Controllers\User\UserController;

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

// Auth
Route::post('login',LoginController::class);
Route::post('register',RegisterController::class);

// Profile
Route::resource('profile', ProfileController::class)->only(['index','store']);

// Posts
Route::apiResource('posts',PostController::class);

// Like 
Route::post('like',LikeController::class);

// Comment
Route::post('comment',CommentController::class);

// Friends
Route::prefix('/friend')->middleware('auth:sanctum')->group(function (){
    Route::get('/requests',FriendRequestsController::class);
    Route::post('/send',SendFriendController::class);
    Route::post('/accept',AcceptFriendController::class);
    Route::delete('/remove',UnFriendController::class);
});

// User
Route::apiResource('users',UserController::class)->only(['index','show']);