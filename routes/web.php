<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ArticlePage;
use App\Http\Livewire\HomePage;
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

Route::get('/', HomePage::class)->name('home');

Route::name('login.')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('create');
    Route::post('/login', [LoginController::class, 'store'])->name('store');
    Route::delete('/logout', [LoginController::class, 'destroy'])->name('destroy');
});

Route::get('/register', RegisterController::class)->name('register');
Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);
Route::resource('articles', ArticleController::class)->except(['index']);
