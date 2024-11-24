<?php

use App\Http\Controllers\ChampionshipController;
use App\Http\Controllers\ClashController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\MatchdayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('panel.index');
});
//Estableciendo las rutas del controlador de los equipos
Route::resource('/teams', TeamController::class)->names('team');
//Estableciendo las rutas del controlador de los campeonatos
Route::resource('/championships', ChampionshipController::class)->names('championship');
//Estableciendo las rutas del controlador de los jugadores
Route::resource('/players', PlayerController::class)->names('player');
//Estableciendo las rutas del controlador de los jugadores
Route::resource('/leaders', LeaderController::class)->names('leader');
//Estableciendo las rutas del controlador de las inscripciones
Route::resource('/inscriptions', InscriptionController::class)->names('inscription');
//Estableciendo las rutas del controlador de los pagos
Route::resource('/payments', PaymentController::class)->names('payment');
//Estableciendo las rutas del controlador de los Arbitros
Route::resource('/referees', RefereeController::class)->names('referee');
//Estableciendo las rutas del controlador de los Partidos
Route::resource('/clashes', ClashController::class)->names('clash');
//Estableciendo las rutas del controlador de las Canchas
Route::resource('/fields', FieldController::class)->names('field');
//Estableciendo las rutas del controlador de las Fechas de Partidos
Route::resource('/matchdays', MatchdayController::class)->names('matchday');
//Estableciendo las rutas del controlador de las Reservas
Route::resource('/reservations', ReservationController::class)->names('reservation');

//Ruta para el coso del PDF
Route::get('/generate-pdf', [ReservationController::class, 'generatePDF'])->name('reservation.generatePDF');