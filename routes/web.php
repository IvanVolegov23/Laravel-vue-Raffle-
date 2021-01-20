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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Host

Route::get('/hosts/index/{id}', [App\Http\Controllers\HostController::class, 'index'])->name('hosts.index');
Route::get('/hosts/create', [App\Http\Controllers\HostController::class, 'create'])->name('hosts.create');
Route::post('/hosts/create', [App\Http\Controllers\HostController::class, 'store'])->name('hosts.store');
Route::delete('/hosts/destroy/{product}', [App\Http\Controllers\HostController::class, 'destroy'])->name('hosts.destroy');
Route::get('/hosts/edit/{product}', [App\Http\Controllers\HostController::class, 'edit'])->name('hosts.edit');
Route::put('/hosts/update/{product}', [App\Http\Controllers\HostController::class, 'update'])->name('hosts.update');

// Route User
Route::post('/user/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user/create/{user}', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::delete('/user/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{raffle}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');