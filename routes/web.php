<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Models\Post;
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


Route::resource('posts', PostsController::class);

Auth::routes();
