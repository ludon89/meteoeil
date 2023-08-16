<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes ressources

Route::resource('observations', ObservationController::class)
    ->middleware(['auth', 'verified']);

Route::resource('comments', CommentController::class)
    ->middleware(['auth', 'verified']);



// ==================== //

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ==================== //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==================== //

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


require __DIR__ . '/auth.php';
