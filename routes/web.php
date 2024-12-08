<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('movie');
Route::get('/movies/{movies}', [\App\Http\Controllers\MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/page/{page}', [\App\Http\Controllers\MovieController::class, 'index'])->name('next');
Route::get('/tvshows', [\App\Http\Controllers\TvController::class, 'index'])->name('tvshow');
Route::get('/tvshows/{tvshows}', [\App\Http\Controllers\TvController::class, 'show'])->name('tv.show');
Route::get('/upmovies', [\App\Http\Controllers\UpController::class, 'index'])->name('upmovies');
Route::get('/upmovies/{upmovies}', [\App\Http\Controllers\UpController::class, 'show'])->name('upmovies.show');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{home}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.show');




require __DIR__.'/auth.php';
