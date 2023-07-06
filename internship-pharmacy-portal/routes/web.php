<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacyOrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('pharmacy-portal');
});

Route::get('/pharmacy-portal', function () {
    return view('pharmacy-portal');
})->middleware(['auth', 'verified'])->name('pharmacy-order');

Route::get('/pharmacy-order', [PharmacyOrderController::class, 'get_pharmacy_order']);

Route::post('/create-order', [PharmacyOrderController::class, 'create_from_scratch']);

Route::patch('/update-order', [PharmacyOrderController::class, 'update_order']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';