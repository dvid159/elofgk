<?php

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
    return view('layout.admin');
});
  
Route::resource('departamentos', 'DepartamentoController');
Route::resource('municipios', 'MunicipioController');
Route::resource('school', 'CentroEducativoController');
Route::resource('clases', 'ClassController');
Route::resource('secciones', 'SeccionController');
Route::resource('materias', 'MateriaController');
Route::resource('criterios', 'CriterioController');
Route::resource('aptitudes', 'AptitudController');
Route::resource('cargos', 'CargoController');
Route::resource('empleados', 'EmpleadoController');
Route::get('nuevo-alumno','AlumnoController@create');
Route::resource('alumnos', 'AlumnoController');
Route::resource('alumnos', 'AlumnoController');
Route::resource('asignacion-docentes', 'GrupoMateriaController');
Route::resource('asignacion-alumnos','AlumnoSeccionController');
Route::resource('record_escolar', 'RecordEscolarController');



 