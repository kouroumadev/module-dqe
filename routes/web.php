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
//// Routes reclamations //////////
Route::get('/reclamation/create', [
    App\Http\Controllers\ReclamationController::class,
    'create',
])->name('reclamation.create');
Route::post('/reclamation/store', [
    App\Http\Controllers\ReclamationController::class,
    'store',
])->name('reclamation.store');
Route::get('/reclamation/getInfo', [
    App\Http\Controllers\ReclamationController::class,
    'getInfo',
]);

Route::get('/reclamation/dqe', [
    App\Http\Controllers\ReclamationController::class,
    'dqe',
])->name('reclamation.dqe');
Route::get('/reclamation/home/pdf/{id}', [
    App\Http\Controllers\ReclamationController::class,
    'homePdf',
])->name('reclamation.home.pdf');

//// Routes rendez-vous //////////
Route::get('/rendezvous/index', [
    App\Http\Controllers\RendezvousController::class,
    'Index',
])->name('rendezvous.index');
Route::get('/rendezvous/prendre', [
    App\Http\Controllers\RendezvousController::class,
    'Prendre',
])->name('rendezvous.prendre');
Route::post('/rendezvous/ref', [
    App\Http\Controllers\RendezvousController::class,
    'Reference',
])->name('rendezvous.reference');
Route::post('/rendezvous/recap', [
    App\Http\Controllers\RendezvousController::class,
    'Recap',
])->name('rendezvous.recap');
Route::post('/rendezvous/conf', [
    App\Http\Controllers\RendezvousController::class,
    'Conf',
])->name('rendezvous.conf');
Route::get('/rendezvous/get-prestation', [
    App\Http\Controllers\RendezvousController::class,
    'GetPrestation',
])->name('prestation.ajax');
Route::get('/rendezvous/recap-pdf/{id}', [
    App\Http\Controllers\RendezvousController::class,
    'RecapPdf',
])->name('recap.pdf');
