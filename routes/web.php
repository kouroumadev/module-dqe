<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reclamation/create', [App\Http\Controllers\ReclamationController::class, 'create'])->name('reclamation.create');
Route::get('/reclamation/getInfo', [App\Http\Controllers\ReclamationController::class, 'getInfo']);

