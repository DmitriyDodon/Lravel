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

Route::get('/', [\App\Http\Controllers\PostController::class,'show']);
Route::get('/author/{author} ', [\App\Http\Controllers\PostController::class,'users']);
Route::get('/category/{category} ', [\App\Http\Controllers\PostController::class,'categories']);

Route::get('/tag', [\App\Http\Controllers\PostController::class,'tags']);
Route::get('/tag/{tag}', [\App\Http\Controllers\PostController::class,'tag']);

Route::get('/author/{author}/category/{category}' , [\App\Http\Controllers\PostController::class, 'author_with_category']);
Route::get('/author/{author}/category/{category}/tag/{tag}' , [\App\Http\Controllers\PostController::class, 'author_with_category_with_tag']);



Route::get('/choose ', [\App\Http\Controllers\PostController::class,'usersChoise']);





