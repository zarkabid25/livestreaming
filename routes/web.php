<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivestreamController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/livestreams/create', [LivestreamController::class, 'create'])->name('livestreams.create');
    Route::post('/livestreams', [LivestreamController::class, 'store'])->name('livestreams.store');
    Route::post('/livestreams/{livestream}/deactivate', [LivestreamController::class, 'deactivate'])->name('livestreams.deactivate');
});


Route::get('/livestreams', [LivestreamController::class, 'index'])->name('livestreams.index');
Route::get('/livestreams/{livestream}', [LivestreamController::class, 'show'])->name('livestreams.show');


Auth::routes();

Route::get('/', function () {
    return redirect()->route('livestreams.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
