<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

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
    return view('home');
});

// Authentication Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/event/create', [EventController::class, 'create']);
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');

Route::post('/upload', [UserController::class, 'store'])->name('test.store');

Route::get('/index',[EventController::class, 'index'])->name('index');

//CRUD

// Diplay all record
// Route::get('/test', [UserController::class, 'index'])->name('test.index');

// // Show create form
// Route::get('/test/create', [UserController::class, 'create'])->name('test.create');

// // Store new record
// Route::post('/test', [UserController::class, 'store'])->name('test.store');

// Show edit form
Route::get('/edit', [UserController::class, 'show'])->name('tests.edit');

//Update Record
Route::put('/edit/{test}/editForm', [UserController::class, 'update'])->name('tests.update');

// // Del Record
Route::delete('/edit/{test}', [UserController::class, 'destroy'])->name('tests.destroy');

// Modify subject details here
Route::get('/edit/{test}/editForm', [UserController::class, 'edit'])->name('tests.edit');


