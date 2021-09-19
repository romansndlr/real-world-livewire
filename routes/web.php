<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
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
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/register', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/@{username}', [UserController::class, 'show'])->name('users.show');
Route::get('/profile/{username}', [UserController::class, 'show'])->name('users.show');
Route::get('/settings', [UserController::class, 'edit'])->name('users.edit');
Route::get('/editor', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/editor/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('/article/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/article/{article}', ArticlePage::class)->name('articles.show');
Route::post('/article', [ArticleController::class, 'store'])->name('articles.store');
