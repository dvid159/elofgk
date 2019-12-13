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

Route::view('/', 'auth/login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('docente/home', 'HomeController@docenteHome')->name('docente.home')->middleware('is_docente');

//------------------Admin routes---------------------------//
Route::resource('/admin/departamentos', 'DepartamentoController');
Route::resource('/admin/municipios', 'MunicipioController');
Route::resource('/admin/school', 'CentroEducativoController');
Route::resource('/admin/clases', 'ClassController');
Route::resource('/admin/secciones', 'SeccionController');
Route::resource('/admin/materias', 'MateriaController');
Route::resource('/admin/criterios', 'CriterioController');
Route::resource('/admin/aptitudes', 'AptitudController');
Route::resource('/admin/cargos', 'CargoController');
Route::resource('/admin/empleados', 'EmpleadoController');
Route::get('nuevo-alumno','AlumnoController@create');
Route::post('/admin/bitacoras','BitacoraCEA@store');
Route::resource('/admin/alumnos', 'AlumnoController');
Route::resource('/admin/asignacion-docentes', 'GrupoMateriaController');
Route::resource('/admin/asignacion-alumnos','AlumnoSeccionController');
Route::resource('/admin/record_escolar', 'RecordEscolarController');
Route::resource('/admin/tiporesponsable', 'TipoResponsableController');
Route::resource('/admin/responsables', 'ResponsableController');
Route::resource('/admin/ocupaciones', 'OcupacionController');
Route::resource('/admin/record_fgk', 'RecordFGKController');
Route::resource('/admin/consolidados', 'ConsolidadosController');

//----------------docente routes----------------------------//
// Route::get('/docente', 'Auth\LoginController@castDocenteUrl');
// Route::get('/admin', 'Auth\LoginController@castAdminUrl');