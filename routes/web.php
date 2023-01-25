<?php


use App\Http\Controllers\ClubRegistrationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\ImageController;
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
    return view("Home.home");
})->name('Home.home');




Route::middleware(['auth'])->group(function(){
    Route::get('/home', function(){
        return view('Feed.feed');
})->name("Feed.Home");
});

Route::get('/create-club', [ClubRegistrationController::class, 'create'])->name('Club.create');
Route::post('/create-club', [ClubRegistrationController::class, 'store'])->name('Club.store');

Route::get('/create-user', [Usercontroller::class, 'create'])->name('User.create');
Route::post('/create-user', [Usercontroller::class, 'store'])->name('User.store');

Route::post('/logout', [LoginController::class, 'logOut'])->name('User.logout');
Route::get('/log-user', [LoginController::class, 'create'])->name('User.log');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name(('User.login'));


Route::get('/image/{id}', [ImageController::class, 'get'])->name('Image.get');