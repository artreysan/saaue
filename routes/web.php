<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\CollaboratorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard', [DashboardController::class, 'index']); //Muestra el detalle de la peticion seleccionada

require __DIR__.'/auth.php';


//Rutas para los equipos
Route::resource('equipment', EquipmentController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion

//Rutas para los colaboradores
Route::resource('collaborator', CollaboratorController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion
Route::resource('collaborator/petition', PetitionController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion
Route::resource('collaborator/equipment', EquipmentController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion

//Rutas para las peticiones
Route::resource('petition', PetitionController::class);
Route::get('petition/{petition}', [PetitionController::class,'showPetition']); //Muestra el detalle de la peticion seleccionada
Route::get('petition/{petition}/{FileID}', [PetitionController::class, 'showPDF']);
Route::get('petition/{petition}/{FileID}/sign', [PetitionController::class, 'showPDFSign']);

Route::post('petition/{petition}', [PetitionController::class, 'updateFile'])->name('petition.updateFile');


//Rutas para  usuarios
Route::resource('user', UserController::class)->middleware('admin');

//Rutas para ver los proyectos
Route::resource('projects', ProjectController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion

//Rutas para ver las bases de datos
Route::resource('databases', DatabaseController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion

//Rutas para las empresas
Route::resource('enterprise', EnterpriseController::class); // Esta ruta sustituye varias lineas haciendo un CRUD, para mayor informacion revisar la documentacion





//Prueba AJAX
Route::post('route/name', [PetitionController::class, 'handleAjaxRequest'] )->name('route.name');
//Prueba AJAX





