<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAvatarController;
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
Route::get('/comments',[CommentsController::class,'index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
Route::get('/create', [CommentsController::class, 'create'])->name('create');
Route::post('/create', [CommentsController::class, 'store'])->name('store');
Route::get('/delete/{id}',[CommentsController::class,'destroy'])->name('delete');
Route::get('/edit/{id}', [CommentsController::class,'edit'])->name('edit');
Route::put('/update/{id}', [CommentsController::class,'update'])->name('update');
Route::get('/profile', [ProfileController::class,'index']);
Route::get('users/{user}',  [UserController::class, 'edit'])->name('users.edit');
Route::patch('users/{user}/update',  [UserController::class, 'update'])->name('users.update');
//Route::resource('/profile', 'App\Http\Controllers\UserController');

Route::get('/profile', [UserAvatarController::class,'profile'])->name('user.profile');
Route::patch('/profile', [UserAvatarController::class,'profile'])->name('user.profile.update');

