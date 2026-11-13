<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function() {
  Route::get('/', [HomeController::class, 'index'])->name('home');

  Route::post('/store', [HomeController::class, 'store'])->name('home.store');
});

require __DIR__.'/auth.php';
