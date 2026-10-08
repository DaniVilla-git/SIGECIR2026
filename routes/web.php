<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('usuarios', UsuariosController::class);
Route::resource('notificaciones', NotificacionesController::class);
Route::resource('documentos', DocumentosController::class);
Route::resource('profesionales', ProfesionalesController::class);
Route::resource('horario_profesional', HorariosProfesionalController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('citas', CitasController::class);
Route::resource('mensajes', MensajesController::class);



