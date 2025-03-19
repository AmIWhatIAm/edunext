<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/event/create', [EventController::class, 'create']);
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');

Route::get('/index',[EventController::class, 'index'])->name('index');
