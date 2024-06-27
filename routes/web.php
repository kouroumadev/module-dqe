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


// MAIL_MAILER=smtp
// MAIL_HOST=mail.cnss.gov.gn
// MAIL_PORT=465
// MAIL_USERNAME=reclamation@cnss.gov.gn
// MAIL_PASSWORD=5JP&3]-zUgzR

// mail.reclamation.doneClient


|
*/
/*<span class="badge " style="background-color: rgb(229, 67, 42); text-align:center">
En retard
<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true">
</span>
</span>*/

//AUTHENTICATION ROUTES
Route::get('/registration', [
    App\Http\Controllers\AuthenController::class,
    'registration',
])->middleware('guest');

Route::post('/registration-user', [
    App\Http\Controllers\AuthenController::class,
    'registerUser',
])
    ->name('user.registration')
    ->middleware('guest');

Route::get('/login', [App\Http\Controllers\AuthenController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/login-user', [
    App\Http\Controllers\AuthenController::class,
    'loginUser',
])
    ->name('user.store')
    ->middleware('guest');

Route::get('/logout', [App\Http\Controllers\AuthenController::class, 'logout'])
    ->name('logout')
    ->middleware('authCheck');

Route::get('/', function () {
    return view('rendezvous.index');
});

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

////ROUTES BACK OFFICE
Route::get('/back', [App\Http\Controllers\ReclamationController::class, 'back'])
    ->name('reclamation.back')
    ->middleware('authCheck');

Route::get('/rendezvous-liste', [
    App\Http\Controllers\RendezvousController::class,
    'RendezvousListe',
])->name('rendezvous.liste');

Route::get('/rendezvous/valide/{id}', [
    App\Http\Controllers\RendezvousController::class,
    'ValidePdf',
])->name('valide.pdf');

Route::get('/rendezvous/back/valide/{id}', [
    App\Http\Controllers\RendezvousController::class,
    'BackValidation',
])->name('rendezvous.back.validation');

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
])->name('reclamation.getInfo');

Route::get('/reclamation/dqe', [
    App\Http\Controllers\ReclamationController::class,
    'dqe',
])
    ->name('reclamation.dqe')
    ->middleware('authCheck');

Route::get('/reclamation/home/pdf/{id}', [
    App\Http\Controllers\ReclamationController::class,
    'homePdf',
])->name('reclamation.home.pdf');

Route::get('/reclamation/home/pdfDone/{id}', [
    App\Http\Controllers\ReclamationController::class,
    'donePdf',
])
    ->name('reclamation.home.pdfDone')
    ->middleware('authCheck');

Route::post('/reclamation/home/done', [
    App\Http\Controllers\ReclamationController::class,
    'done',
])
    ->name('reclamation.home.done')
    ->middleware('authCheck');

Route::get('/reclamation/mail/conf', [
    App\Http\Controllers\ReclamationController::class,
    'confMail',
])->name('reclamation.mail.conf');

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
Route::get('/info/ajax', [
    App\Http\Controllers\RendezvousController::class,
    'InfoAjax',
])->name('info.ajax');
Route::get('/rendezvous/get-horaire', [
    App\Http\Controllers\RendezvousController::class,
    'GetHoraire',
])->name('horaire.ajax');
Route::get('/rendezvous/recap-pdf/{id}', [
    App\Http\Controllers\RendezvousController::class,
    'RecapPdf',
])->name('recap.pdf');


////// BIOMETRIE ROUTES ////////
Route::get('/biometrie/index', [
    App\Http\Controllers\BiometrieController::class,
    'BiometrieIndex',
])->name('biometrie.index');
Route::get('/employeur/info/ajax', [
    App\Http\Controllers\BiometrieController::class,
    'EmployeurInfoAjax',
])->name('employeur.info.ajax');

Route::get('/send/otp/ajax', [
    App\Http\Controllers\BiometrieController::class,
    'SendOtpAjax',
])->name('send.otp.ajax');