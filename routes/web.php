<?php

use App\Livewire\Mosque\Create as CreateMosque;
use App\Livewire\Mosque\Index as IndexMosque;
use App\Livewire\Mosque\Edit as EditMosque;
use App\Livewire\Mosque\Show as ShowMosque;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Apply authentication middleware to the profile route
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Apply authentication middleware to all mosque-related routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', IndexMosque::class)->name('dashboard');
    Route::get('/mosques/create', CreateMosque::class)->name('mosques.create');
    Route::get('/mosques/{mosque}', ShowMosque::class)->name('mosques.show');
    Route::get('/mosques/{mosque}/edit', EditMosque::class)->name('mosques.edit');
});

require __DIR__ . '/auth.php';
