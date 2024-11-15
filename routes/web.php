<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonyvController;
use App\Http\Controllers\FoglalasController;

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
// Új konyv felvitele
Route::get('/new-book', [KonyvController::class, 'create']);
Route::post('/new-book', [KonyvController::class, 'store']);

// Könyvek listája
Route::get('/konyvek', [KonyvController::class, 'index'])->name('konyvek.index');
Route::get('/konyvek/{id}', [KonyvController::class, 'show'])->name('konyvek.show');
// Kölcsönzés hozzáadása
Route::post('/foglalas', [FoglalasController::class, 'store']);

// Kölcsönzések listája
Route::get('/foglalasok', [FoglalasController::class, 'index']);
Route::get('/foglalasok/{id}', [FoglalasController::class, 'show']);
Route::put('/foglalasok/{id}', [FoglalasController::class, 'update'])->name('foglalasok.update');
require __DIR__.'/auth.php';
