<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;


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
 Route::get('/', [RegistrationController::class, 'registration']);
Route::get('/dashboard', [RegistrationController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [RegistrationController::class, 'logout'])->name('dashboard.logout');

Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
Route::get('/all-post',[PostController::class, 'index'])->name('all.post');
Route::get('/post-edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::post('/post-update/{id}',[PostController::class, 'update'])->name('post.update');
Route::get('/post-delete/{id}',[PostController::class, 'destroy'])->name('post.destroy');
          //peginetion and search
Route::get('/pagination/paginate-data',[PostController::class, 'paginetion']);
Route::get('/search-post',[PostController::class,'searchPost'])->name('search.post');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





