<?php

use App\Events\MyEvent;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotifAdminController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Auth;
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
Route::resource('testing', TestingController::class);
Route::resource('notif', NotifAdminController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');