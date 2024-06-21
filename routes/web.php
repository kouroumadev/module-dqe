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

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L]
</IfModule>


|
*/
/*<span class="badge " style="background-color: rgb(229, 67, 42); text-align:center">
En retard
<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true">
</span>
</span>*/

Route::get('/', function () {
    return view('rendezvous.index');
});

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

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
Route::get('/index', [
    App\Http\Controllers\RendezvousController::class,
    'Index',
])->name('rendezvous.index');
Route::get('/rendezvous/prendre', [
    App\Http\Controllers\RendezvousController::class,
    'Prendre',
])->name('rendezvous.prendre');
Route::get('/rendezvous/gestion', [
    App\Http\Controllers\RendezvousController::class,
    'Gestion',
])->name('rendezvous.gestion');
Route::post('/rendezvous/edit', [
    App\Http\Controllers\RendezvousController::class,
    'Edit',
])->name('rendezvous.edit');
Route::get('/rendezvous/delete/{id}', [
    App\Http\Controllers\RendezvousController::class,
    'Delete',
])->name('rendezvous.delete');
// Route::post('/rendezvous/ref', [
//     App\Http\Controllers\RendezvousController::class,
//     'Reference',
// ])->name('rendezvous.reference');
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
Route::get('/rendezvous/get-date', [
    App\Http\Controllers\RendezvousController::class,
    'GetDate',
])->name('date.ajax');
Route::get('/rendezvous/get-horaire', [
    App\Http\Controllers\RendezvousController::class,
    'GetHoraire',
])->name('horaire.ajax');
Route::get('/rendezvous/recap-pdf/{id}', [
    App\Http\Controllers\RendezvousController::class,
    'RecapPdf',
])->name('recap.pdf');
