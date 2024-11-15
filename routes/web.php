<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonyvController;
use App\Http\Controllers\FoglalasController;
use App\Http\Controllers\MufajController;

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

// Új mufaj felvitele
Route::get('/new-genre', [MufajController::class, 'create']);
Route::post('/new-genre', [MufajController::class, 'store']);

// Könyvek listája
Route::get('/konyvek', [KonyvController::class, 'index'])->name('konyvek.index');
Route::get('/konyvek/{id}', [KonyvController::class, 'show'])->name('konyvek.show');
// Kölcsönzés hozzáadása
Route::post('/foglalas', [FoglalasController::class, 'store']);

// Kölcsönzések listája

Route::put('/foglalasok/{id}', [FoglalasController::class, 'update'])->name('foglalasok.update');
// Example of a POST-only route
Route::post('/foglalas', [FoglalasController::class, 'store'])->name('foglalas.store');

// To allow GET as well:
Route::match(['get', 'post'], '/foglalas', [FoglalasController::class, 'store']);
require __DIR__.'/auth.php';
