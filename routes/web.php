<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\SecretariasController;

Route::get('/', function () {
    return view('modulos.Seleccionar');
});

Route::get('/Ingresar', function () {
    return view('modulos.Ingresar');
});

Auth::routes();

Route::get('Inicio', [InicioController::class, 'index']);
Route::get('Inicio-Editar', [InicioController::class, 'edit']);
Route::put('Inicio-Editar', [InicioController::class, 'update']);
Route::get('Mis-Datos', [InicioController::class, 'DatosCreate']);
Route::put('Mis-Datos', [InicioController::class, 'DatosUpdate']);


Route::get('Consultorios', [ConsultoriosController::class, 'index']);
Route::post('Consultorios', [ConsultoriosController::class, 'store']);
Route::put('Consultorio/{id}', [ConsultoriosController::class, 'update']);
Route::delete('borrar-Consultorio/{id}', [ConsultoriosController::class, 'destroy']);

//Ver consultorios como Paciente
Route::get('Ver-Consultorios', [ConsultoriosController::class, 'verConsultorios']);

Route::get('Doctores', [DoctoresController::class, 'index']);
Route::get('Crear-Doctor', [DoctoresController::class, 'create']);
Route::post('Crear-Doctor', [DoctoresController::class, 'store']);
Route::get('Editar-Doctor/{id}', [DoctoresController::class, 'edit']);
Route::put('actualizar-doctor/{doctor}', [DoctoresController::class, 'update']);
Route::get('Eliminar-Doctor/{id}', [DoctoresController::class, 'destroy']);

//Ver doctores como pasiente
Route::get('Ver-Doctores/{id}', [DoctoresController::class, 'VerDoctores']);

Route::get('Pacientes', [PacientesController::class, 'index']);
Route::get('Crear-Paciente', [PacientesController::class, 'create']);
Route::post('Crear-Paciente', [PacientesController::class, 'store']);
Route::get('Editar-Paciente/{id}', [PacientesController::class, 'edit']);
Route::put('actualizar-paciente/{paciente}', [PacientesController::class, 'update']);
Route::get('Eliminar-Paciente/{id}', [PacientesController::class, 'destroy']);

// Route::put('crear-control', [PacientesController::class, 'crearControl']);

Route::get('Citas/{id}', [CitasController::class, 'index']);
Route::post('Horario', [CitasController::class, 'HorarioDoctor']);
Route::put('editar-horario/{id}', [CitasController::class, 'EditarHorario']);
Route::post('Citas/{id_doctor}', [CitasController::class, 'CrearCitas']);
Route::delete('borrar-cita', [CitasController::class, 'destroy']);

//Historial de citas Paciente
Route::get('Historial', [CitasController::class, 'historial']);
Route::get('Reporte', [CitasController::class, 'reporte'])->name('Reporte');
Route::get('ReporteCitas', [CitasController::class, 'reportecitas'])->name('ReporteCitas');
Route::get('Descarga', [CitasController::class, 'descarga'])->name('Descarga');
// Route::post('search',[CitasController::class, 'reportecitas'])->name('search');

Route::get('Secretarias', [SecretariasController::class, 'index']);
Route::get('Crear-Secretaria', [SecretariasController::class, 'create']);
Route::post('Crear-Secretaria', [SecretariasController::class, 'store']);
Route::get('Editar-Secretaria/{id}', [SecretariasController::class, 'edit']);
Route::put('actualizar-secretaria/{secretaria}', [SecretariasController::class, 'update']);
Route::get('Eliminar-Secretaria/{id}', [SecretariasController::class, 'destroy']);


