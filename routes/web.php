<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;

Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

<<<<<<< HEAD
Route::resource('profesionales',ProfesionalesController::class);
Route::resource('horario_profesional',HorariosProfesionalController::class);
=======
Route::resource('usuarios', UsuariosController::class);
Route::resource('servicios', ServiciosController::class);
>>>>>>> origin/prueba
