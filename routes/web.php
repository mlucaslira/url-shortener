<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

/* Rota para redirecionamento das URLS encurtadas */
Route::get('{short_code}', [RedirectController::class, 'handleRedirect']);

require __DIR__.'/settings.php';
