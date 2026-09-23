<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;
use App\Http\Controllers\ServiciosController;

Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('profesionales',ProfesionalesController::class);
<<<<<<< HEAD
Route::resource('horario_profesional',HorariosProfesionalController::class);
Route::resource('usuarios', UsuariosController::class);
Route::resource('servicios', ServiciosController::class);
=======
Route::resource('servicios',ServiciosController::class);
Route::resource('horario_profesional',HorariosProfesionalController::class);
>>>>>>> Dev2-A
