<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;


Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('profesionales',ProfesionalesController::class);
Route::resource('horario_profesional',HorariosProfesionalController::class);
Route::resource('servicios', ServiciosController::class);


