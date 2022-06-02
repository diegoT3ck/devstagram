<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegsterController;
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
Route::get('/login',[RegsterController::class, 'index'])->name('login');