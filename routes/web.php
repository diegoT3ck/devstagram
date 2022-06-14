<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegsterController;
use App\Http\Controllers\FollowerController;

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
    return view('layouts.app');
});
Route::get('/crear-cuenta',[RegsterController::class, 'index'])->name('register');
Route::post('/nuevo-usuario',[RegsterController::class, 'store']);

//rutas para el perfil 
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}',[PostController::class, 'index'])->name('post.index'); //RoRoute Model Building
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
//Like a las fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('post.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('post.likes.destroy');

//Siguiendo Usuario
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
//sail artisan make:model Follower -mc
//sail artisan route:list
//sail artisan route:cache
//sail php artisan migrate:rollback --step=1