<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuth;
use App\Http\Controllers\serve;
use App\Http\Controllers\delete;
use App\Http\Controllers\update;
use App\Http\Controllers\booking;
use App\Http\Controllers\complete;
use App\Http\Controllers\rfd;
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

Route::view("sam",'sam');
Route::view("adminlog",'adminlog');
Route::view("cklog",'cklog');
Route::view("adadmin",'adadmin');
Route::post("user",[userAuth::class,'userlogin']);
Route::post("serve",[serve::class,'serve']);
Route::post("delete",[delete::class,'delete']);
Route::post("update",[update::class,'update']);
Route::post("booking",[booking::class,'booking']);
Route::post("complete",[complete::class,'complete']);
Route::post("rfd",[rfd::class,'rfd']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
