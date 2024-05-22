<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\IndexController;
//Agregamos los controladores para roles y permisos
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
return view('Plantilla.Menu');
});

//Route::get('/', function () {
//return view('auth.login');
//});


//Route::get('/', function () {
 //   return view('intro');
//});
//Route::get('/Alumno', function () {
 // return view('Alumno.index');
//});
/////PARA ROLES Y PERMISOS

Route::group(['middleware'=> ['auth']],function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('Alumno', AlumnosController::class);
});

/////fin PARA ROLES Y PERMISOS

Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/Cursos',[IndexController::class,'cursos'])->name('Cursos');
Route::get('/QuienesSomos',[IndexController::class,'quienessomos'])->name('QuienesSomos');
Route::get('/Contacto',[IndexController::class,'contacto'])->name('Contacto');
Route::get('/Perfil',[IndexController::class,'perfil'])->name('Perfil');

//RUTAS DE MAS INFORMACION DE LOS CURSOS
Route::get('/CursodeMaquillajeProfesional',[IndexController::class,'MaquillajeProfesional'])->name('CursodeMaquillajeProfesional');
Route::get('/CursodeAutomaquillaje',[IndexController::class,'Automaquillaje'])->name('CursodeAutomaquillaje');
Route::get('/CursodePeinados',[IndexController::class,'Peinados'])->name('CursodePeinados');
Route::get('/CursodePlanchado',[IndexController::class,'Planchado'])->name('CursodePlanchado');
//FIN DE RUTAS DE MAS INFORMACION DE LOS CURSOS

// web.php

//Route::get('/', 'IndexController@index')->name('index');
//Route::get('/Contacto', 'IndexController@index')->name(' Contacto');





Route::get('/Alumno/create',[AlumnosController::class,'create']);
Auth::routes();

Route::get('/home', [AlumnosController::class, 'index'])->name('home');

//YA NO SE USA LO ANTERIOS PORQUE YA REEMPLAZAMOS TODO ESO
//POR LO SIGUIENTE:

Route::resource('/Alumno', AlumnosController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

/*Route::get('/home', [AlumnosController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [AlumnosController::class, 'index'])->name('home');
});*/


Route::resource('/Maestro', MaestrosController::class);
Route::resource('/Curso', CursosController::class);
Route::resource('/Materia', MateriasController::class);
