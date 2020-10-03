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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\MessagesController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\MessagesController::class, 'create'])->name('create');
Route::get('/sent', [App\Http\Controllers\MessagesController::class, 'sent'])->name('sent');
Route::get('/trash', [App\Http\Controllers\MessagesController::class, 'trash'])->name('trash');
Route::get('/restore/{id}', [App\Http\Controllers\MessagesController::class, 'restore'])->name('restore');
Route::get('/read/{id}', [App\Http\Controllers\MessagesController::class, 'read'])->name('read');
Route::get('/show/{id}', [App\Http\Controllers\MessagesController::class, 'show'])->name('show');
Route::get('/delete/{id}', [App\Http\Controllers\MessagesController::class, 'delete'])->name('delete');

Route::post('/send', [App\Http\Controllers\MessagesController::class, 'send'])->name('send');
Route::post('/reply/{id}', [App\Http\Controllers\MessagesController::class, 'reply'])->name('reply');

