<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TemplateController;
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
Route::get('/about', function (){
    return view('Layouts.about');
})->name('about-p');
Route::get('/contact', function (){
    return view('Layouts.contact');
})->name('contact-p');

Route::get('/reservations', function (){
    return view('Layouts.reservations');
})->name('reservation-p');
Route::get('/horaires', function (){
    return view('Layouts.horaires');
})->name('horaire-p');
Route::get('/train', function (){
    return view('Layouts.train');
})->name('train-p');


// groupage des routes du templates
Route::controller(TemplateController::class)->group( function (){
    Route::get('/','index')->name('accueil');
    Route::match(['get', 'post'], '/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('app-dashboard');
});

// groupage des routes d'auth (loginController)
Route::controller(LoginController::class)->group( function (){
    //chemin de deconnexion
    Route::get('/logout','logout')->name('logout-p');
    // route d'activation du compte
    Route::get('/user_checker',  'userChecker')->name('user_checker-p');
    // route d'activation du compte
    Route::match(['get', 'post'], '/activation/{token}', 'activationCode')->name('activationCode-p');
    // route de resend email activation
    Route::get( '/resend_activation_code/{token}','resendCode')->name('resendcode-p');
    //route de click lien activation du compte
    Route::get('/activationlink/{token}', 'activationLink')->name('activationLink-p');
    // route de mdp oublie
    Route::match(['get', 'post'], '/forgot_password', 'forgotPassword')->name('forgotPassword-p');
    // route de changement du mdp
    Route::match(['get', 'post'], '/change_password/{token}', 'changePassword')->name('changePassword-p');

});


/*Route::match(['get', 'post'], '/login',[LoginController::class,'login'])->name('login-p');
Route::match(['get', 'post'], '/sign',[LoginController::class,'sign'])->name('sign-p');*/


