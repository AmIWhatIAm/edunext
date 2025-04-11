<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TestController;

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

Route::get('/event/create', [EventController::class, 'create']);
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');

Route::post('/upload', [TestController::class, 'store'])->name('test.store');

Route::get('/index',[EventController::class, 'index'])->name('index');

//CRUD

// Diplay all record
// Route::get('/test', [TestController::class, 'index'])->name('test.index');

// // Show create form
// Route::get('/test/create', [TestController::class, 'create'])->name('test.create');

// // Store new record
// Route::post('/test', [TestController::class, 'store'])->name('test.store');

// Show edit form
Route::get('/edit', [TestController::class, 'show'])->name('tests.edit');

// //Update Record
// Route::put('/tests/{tests}', [TestController::class, 'update'])->name('tests.update');

// // Del Record
Route::delete('/edit/{test}', [TestController::class, 'destroy'])->name('tests.destroy');

// Modify subject details here
Route::get('/edit/{test}/editForm', [TestController::class, 'edit'])->name('tests.edit');
Route::put('/edit/{test}', [TestController::class, 'update'])->name('tests.update');


