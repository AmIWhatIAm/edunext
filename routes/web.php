<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::post('/upload', [UserController::class, 'store'])->name('subject.store');


//CRUD

// Show edit form
Route::get('/edit', [UserController::class, 'show'])->name('subject.edit');

//Update Record
Route::put('/edit/{subject}/editForm', [UserController::class, 'update'])->name('subject.update');

// Del Record
Route::delete('/edit/{subject}', [UserController::class, 'destroy'])->name('subject.destroy');

// Modify subject details here
Route::get('/edit/{subject}/editForm', [UserController::class, 'edit'])->name('subject.edit');


