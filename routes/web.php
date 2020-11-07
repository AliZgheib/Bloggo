<?php

//controllers
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [PagesController::class, 'index']);

Route::get('/home', [PagesController::class, 'home']);

Route::get('/about', [PagesController::class, 'about']);

//contact form
Route::get('/contact',  [PagesController::class, 'contact']);

Route::post('/contact',  [PagesController::class, 'postContact']);


//handle all type of requests on post
Route::resource('posts', PostsController::class);


//handle like requests
Route::get('/like/{postId}', [LikesController::class, 'checkStatus']);

Route::post('/like/{postId}', [LikesController::class, 'switchStatus']);

Route::get('/likes/{postId}', [LikesController::class, 'getAllLikes']);


//handle comment request

Route::get('/comment/{postId}', [CommentsController::class, 'getComments']);


Route::post('/comment/{postId}', [CommentsController::class, 'postComment']);


Auth::routes();
