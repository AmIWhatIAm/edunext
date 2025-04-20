<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Str;
use App\Models\Chapter;

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
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Lecturer routes
Route::middleware(['auth:lecturer', 'role:lecturer'])->group(function () {
    $slugs = implode('|', array_map(
        fn($s)=> Str::slug(strtolower($s)),
        Chapter::subjects()
    ));

    Route::get('lecturer/main/{subject?}', [UserController::class, 'lecturerMain'])
        ->where('subject', "($slugs)?")
        ->name('lecturer.main');
    // Show upload chapter form
    Route::get('/upload', [ChapterController::class, 'create'])->name('chapter.create');
    // Save chapter
    Route::post('/chapter', [ChapterController::class, 'store'])->name('chapter.store');
    // Show edit chapter form
    Route::get('/edit', [ChapterController::class, 'show'])->name('chapter.edit');
    // Modify chapter details here
    Route::get('/edit/{chapter}/editForm', [ChapterController::class, 'edit'])->name('chapter.editForm');
    //Update chpater
    Route::put('/edit/{chapter}/editForm', [ChapterController::class, 'update'])->name('chapter.update');
    // Del Record
    Route::delete('/edit/{chapter}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
});

// student routes
Route::middleware(['auth:student', 'role:student'])->group(function () {
    $slugs = implode('|', array_map(
        fn($s)=> Str::slug(strtolower($s)),
        Chapter::subjects()
    ));
    
    Route::get('student/main/{subject?}', [UserController::class, 'studentMain'])
    ->where('subject', "($slugs)?")
    ->name('student.main');
});

// Profile routes
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');

Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');

Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

Route::fallback(function () {
    return redirect()->route('home')
    ->with('error', 'The page you requested does not exist.');
});