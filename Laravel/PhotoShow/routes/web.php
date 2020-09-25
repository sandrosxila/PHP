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


Route::get('/',[App\Http\Controllers\AlbumsController::class,'index']);
Route::get('/albums',[App\Http\Controllers\AlbumsController::class,'index']);
Route::get('/albums/create',[App\Http\Controllers\AlbumsController::class,'create'])->name('album-create');
Route::get('/albums/{albumId}',[App\Http\Controllers\AlbumsController::class,'show']);
Route::post('/albums/store',[App\Http\Controllers\AlbumsController::class,'store'])->name('album-store');
Route::delete('/albums/{albumId}',[App\Http\Controllers\AlbumsController::class,'destroy']);

Route::get('/photos/create/{albumId}',[App\Http\Controllers\PhotosController::class,'create']);
Route::get('/photos/{photoId}',[App\Http\Controllers\PhotosController::class,'show']);
Route::post('/photos/store/{albumId}',[App\Http\Controllers\PhotosController::class,'store'])->name('photos-store');
Route::delete('/photos/{photoId}',[App\Http\Controllers\PhotosController::class,'destroy'])->name('photo-destroy');
