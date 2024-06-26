<?php

use App\Http\Controllers\ItemController;
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

Route::get('/', function () {return view('welcome');});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [ItemController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [ItemController::class, 'store'])->name('dashboard.store');
    Route::delete('/dashboard/delete/{id}', [ItemController::class, 'destroy'])->name('dashboard.delete');
    Route::put('/dashboard/{id}/status', [ItemController::class, 'status'])->name('status');
});

require __DIR__ . '/auth.php';
