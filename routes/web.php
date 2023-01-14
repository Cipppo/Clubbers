<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;

use App\Http\Controllers\LoginController;

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
    return view("welcome");
})->name('Home.home');



Route::get('/create-user', [Usercontroller::class, 'create'])->name('User.create');
Route::post('/create-user', [Usercontroller::class, 'store'])->name('User.store');

Route::get('/logIn', [LoginController::class, 'create'])->name('User.logIn');