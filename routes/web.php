<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
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
})->name('upload.page');

Route::get('/edit', function () {
    return view('edit');
});


Route::get('/upload', [UserController::class, 'course'])->name('upload');



//CRUD
Route::post('/upload', [ChapterController::class, 'store'])->name('chapter.store');

// Show edit form
Route::get('/edit', [ChapterController::class, 'show'])->name('chapters.edit');

//Update Record
Route::put('/edit/{chapter}/editForm', [ChapterController::class, 'update'])->name('chapters.update');

// // Del Record
Route::delete('/edit/{chapter}', [ChapterController::class, 'destroy'])->name('chapters.destroy');

// Modify chapter details here
Route::get('/edit/{chapter}/editForm', [ChapterController::class, 'edit'])->name('chapters.edit');



Route::post('/auth', [UserController::class,'handle'])->name('auth.handle');
Route::get('/student/main', [UserController::class, 'studentMain'])->name('student.main');
Route::get('/teacher/main', [UserController::class, 'teacherMain'])->name('teacher.main');
Route::get('/subject/{id}', [SubjectController::class, 'getTopics']);