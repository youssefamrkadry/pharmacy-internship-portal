<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pharmacy-order', [PharmacyOrderController::class, 'get_pharmacy_order']);

Route::post('/create-order', [PharmacyOrderController::class, 'create_from_scratch']);

Route::patch('/update-order', [PharmacyOrderController::class, 'update_order']);