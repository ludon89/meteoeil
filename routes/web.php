<?php

use App\Http\Controllers\AdminController;
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

// ==================== Routes ressources ==================== //

Route::resource('observations', ObservationController::class)
    ->middleware(['auth', 'verified']);

Route::resource('comments', CommentController::class)
    ->middleware(['auth', 'verified']);


// ==================== //

// Display home page
Route::get('/', [ObservationController::class, 'index'])
    ->name('index');

// Display specified observation's page
Route::get('/observations/{observation}', [ObservationController::class, 'show'])
    ->name('observations.show');

// Display user dashboard
Route::get('/dashboard', [ObservationController::class, 'indexDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



// ==================== Admin ==================== //

Route::group(['middleware' => ['auth', 'isadmin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])
        ->name('admin.dashboard');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])
        ->name('admin.users.destroy');
    Route::redirect('/admin', '/admin/dashboard');
});



// ==================== Auth ==================== //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'avatarDestroy'])->name('profile.avatar.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ==================== Debug ==================== //

Route::get('/test', function () {
    return view('test');
})->name('test');


require __DIR__ . '/auth.php';
