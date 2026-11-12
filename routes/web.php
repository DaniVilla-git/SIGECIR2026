<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;
use App\Http\Controllers\Paciente\PortalPacienteController;
use App\Http\Controllers\PacientePerfilController;
use App\Http\Controllers\Seguridad\AuthController;


Route::view('/', 'welcome')->name('inicio');

// INICIO DE SESIÓN
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.procesar');

// RECUPERAR CONTRASEÑA
Route::get('/recuperar-contrasena', [AuthController::class, 'mostrarFormularioRecuperacion'])
    ->name('password.request');

Route::post('/recuperar-contrasena', [AuthController::class, 'enviarEnlaceRecuperacion'])
    ->name('password.email');

Route::get('/restablecer-contrasena/{token}', [AuthController::class, 'mostrarFormularioRestablecimiento'])
    ->name('password.reset');

Route::post('/restablecer-contrasena', [AuthController::class, 'restablecerContrasena'])
    ->name('password.update');


/*
|--------------------------------------------------------------------------
| CONFIRMACIÓN DE CITAS POR CORREO
|--------------------------------------------------------------------------
*/

Route::get('/citas/{id}/confirmar-correo', [CitasController::class, 'mostrarConfirmacion'])
    ->middleware('signed')
    ->name('citas.confirmar.correo');

Route::post('/citas/{id}/confirmar-correo', [CitasController::class, 'confirmarDesdeCorreo'])
    ->middleware('signed')
    ->name('citas.confirmar.procesar');


/*
|--------------------------------------------------------------------------
| RUTAS GENERALES
|--------------------------------------------------------------------------
*/

Route::middleware('web')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | CIERRE DE SESIÓN
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | PORTAL DEL PACIENTE
    |--------------------------------------------------------------------------
    */

    Route::middleware(['auth', 'role:Paciente'])
        ->prefix('paciente')
        ->name('paciente.')
        ->group(function () {

            Route::get('/documentos/{id}/ver',[PortalPacienteController::class, 'verDocumento'])
                ->name('documentos.ver');
            // INICIO
            Route::get('/', [PortalPacienteController::class, 'index'])
                ->name('inicio');

            // MIS CITAS
            Route::get('/mis-citas', [PortalPacienteController::class, 'misCitas'])
                ->name('mis-citas');

            // SOLICITAR CITA
            Route::get('/solicitar-cita', [PortalPacienteController::class, 'crearCita'])
                ->name('crear-cita');

            Route::post('/solicitar-cita', [PortalPacienteController::class, 'guardarCita'])
                ->name('guardar-cita');

            // PROFESIONAL DEL SERVICIO
            Route::get('/servicio/{id}/profesional', [ServiciosController::class, 'obtenerProfesional'])
                ->name('servicio.profesional');

            // DISPONIBILIDAD
            Route::get('/disponibilidad-citas', [CitasController::class, 'disponibilidad'])
                ->name('citas.disponibilidad');


            /*
            |--------------------------------------------------------------------------
            | EDITAR DATOS DEL PACIENTE
            |--------------------------------------------------------------------------
            */

            Route::get('/mis-datos', [PortalPacienteController::class, 'editarPerfil'])
                ->name('paciente.perfil.edit');

            Route::put('/mis-datos', [PortalPacienteController::class, 'actualizarPerfil'])
                ->name('paciente.perfil.update');

        });


    /*
    |--------------------------------------------------------------------------
    | MÓDULOS ADMINISTRATIVOS
    |--------------------------------------------------------------------------
    */

    Route::middleware(['auth', 'can:' . config('seguridad.permiso_admin')])
        ->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard.index');

            Route::resource('usuarios', UsuariosController::class);

            Route::resource('documentos', DocumentosController::class);

            Route::get('/documentos/{id}/ver', [DocumentosController::class, 'ver'])
                ->name('documentos.ver');

            Route::resource('notificaciones', NotificacionesController::class);

            Route::resource('profesionales', ProfesionalesController::class);

            Route::resource('horario_profesional', HorariosProfesionalController::class);

            Route::resource('servicios', ServiciosController::class);

            Route::get('/servicios/{id}/profesional', [ServiciosController::class, 'obtenerProfesional'])
                ->name('servicios.profesional');

            Route::get('citas/disponibilidad', [CitasController::class, 'disponibilidad'])
                ->name('citas.disponibilidad');

            Route::resource('citas', CitasController::class);

            Route::resource('mensajes', MensajesController::class);

            Route::get('/admin', function () {
                return view('Admin.index');
            })->name('admin.index');
        });


    /*
    |--------------------------------------------------------------------------
    | PORTAL DE PROFESIONALES
    |--------------------------------------------------------------------------
    */

    // INICIO DE SESIÓN PROFESIONAL
    Route::get('/vista-login-profesional', function () {
        return view('Profesionales.login');
    })->name('profesionales.login');


    // RUTAS EXCLUSIVAS PARA PROFESIONALES
    Route::middleware(['auth', 'role:profesional'])->group(function () {

        Route::get('/dashboard-profesional', [ProfesionalesController::class, 'dashboard'])
            ->name('profesionales.dashboard');

        Route::get('/agenda-profesional', [ProfesionalesController::class, 'agenda'])
            ->name('profesionales.agenda');

        Route::get('/pacientes-profesional', [ProfesionalesController::class, 'pacientes'])
            ->name('profesionales.pacientes');

        Route::get('/notificaciones-profesional', [ProfesionalesController::class, 'notificaciones'])
            ->name('profesionales.notificaciones');

        Route::get('/horario-profesional', [ProfesionalesController::class, 'horario'])
            ->name('profesionales.horario');

        Route::get('/perfil-profesional', function () {
            return view('Profesionales.perfil');
        })->name('profesionales.perfil');

        Route::get('/documentos-profesional/{id}', [
            ProfesionalesController::class,
            'verDocumento'
        ])->name('documento');
    });

});
