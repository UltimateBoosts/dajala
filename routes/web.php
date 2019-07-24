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

// Route::view('/{path?}', 'app')->where('path', '.*');
$servicios = array();
$servicios[] = array("titulo" => "DESARROLLO RURAL SOSTENIBLE", "image" => "servicio_1.jpg");
$servicios[] = array("titulo" => "ECOLOGÍA", "image" => "servicio_2.jpg");
$servicios[] = array("titulo" => "ACTUALIZACIÓN EN ASUNTOS AMBIENTALES" , "image" => "servicio_3.jpg");
$servicios[] = array("titulo" => "INGENIERÍA AMBIENTAL", "image" => "servicio_4.jpg");
$servicios[] = array("titulo" => "PLANEACIÓN Y ORDENAMIENTO TERRITORIAL", "image" => "servicio_5.jpg");
$servicios[] = array("titulo" => "ASESORÍAS, CONSULTORÍAS Y APOYOS A ONG’S Y EMPRESAS SIN ÁNIMO DE LUCRO, ECONOMÍA SOLIDARIA DEL SECTOR AMBIENTAL", "image" => "servicio_6.jpg");
$servicios[] = array("titulo" => "DESARROLLO Y EJECUCIÓN PLANES, PROGRAMAS, PROYECTOS Y ACTIVIDADES AMBIENTALES PARA EL POSTCONFLICTO Y BÚSQUEDA Y CONSOLIDACIÓN DE LA PAZ", "image" => "servicio_7.jpg");
$servicios[] = array("titulo" => "PROTECCIÓN SOCIAL INTEGRAL DE LAS PERSONAS AFECTADAS POR LA TOMA DE DECISIONES EN MATERIA DE CUMPLIMIENTO DE DECISIONES JUDICIALES O DE POLÍTICAS AMBIENTALES", "image" => "servicio_8.jpg");
$servicios[] = array("titulo" => "PROYECTOS DE DESARROLLO CON ENFOQUE AMBIENTAL", "image" => "servicio_9.jpg");
$servicios[] = array("titulo" => "SEGURIDAD ALIMENTARIA, COMPLEMENTARIEDAD Y AUTOABASTECIMIENTO BAJO CRITERIOS ORGÁNICOS", "image" => "servicio_10.jpg");
$servicios[] = array("titulo" => "EJECUCIÓN DE PLANES Y PROYECTOS EN TEMAS SANITARIOS BAJO CRITERIOS DE CONSERVACIÓN Y PRESERVACIÓN AMBIENTAL", "image" => "servicio_11.jpg");
$servicios[] = array("titulo" => "FORMULACIÓN, DESARROLLO Y EJECUCIÓN DE PLANES, PROGRAMAS Y PROYECTOS DE ECOTURISMO Y ASUNTOS AMBIENTALES", "image" => "servicio_12.jpg");
$servicios[] = array("titulo" => "REFORESTACIÓN CON ESPECIES NATIVAS", "image" => "servicio_13.jpg");
$servicios[] = array("titulo" => "REPOBLAMIENTO DE REFORESTACIÓN", "image" => "servicio_14.jpg");
$servicios[] = array("titulo" => "DEFENSA, PROTECCIÓN Y PROMOCIÓN Y ACTUALIZACIÓN DE DERECHOS AMBIENTALES Y CONEXOS", "image" => "servicio_15.jpg");
$servicios[] = array("titulo" => "FONDO EDITORIAL AMBIENTAL Y ECOLÓGICO", "image" => "servicio_16.jpg");
$servicios[] = array("titulo" => "CULTURA MARÍTIMA Y OCEÁNICA", "image" => "servicio_17.jpg");
$servicios[] = array("titulo" => "RECUPERACIÓN Y MANEJO DE LA ESTRUCTURA ECOLÓGICA PRINCIPAL", "image" => "servicio_18.jpg");
$servicios[] = array("titulo" => "AMBIENTE SANO PARA LA EQUIDAD Y DISFRUTE DEL CIUDADANO", "image" => "servicio_19.jpg");
$servicios[] = array("titulo" => "ADAPTACIÓN AL CAMBIO CLIMÁTICO", "image" => "servicio_20.jpg");
$servicios[] = array("titulo" => "PLAN DE MANEJO FRANJA ADECUACIÓN A RESERVAS FORESTALES", "image" => "servicio_21.jpg");

Route::view('/', 'landing')->middleware(['XSS']);
Route::view('/home', 'landing')->middleware(['XSS']);
Route::view('/quienes-somos', 'about')->middleware(['XSS']);
Route::view('/servicios', 'services', array("data" => $servicios ))->middleware(['XSS']);
Route::view('/contacto', 'contact')->middleware(['XSS']);
Route::view('/dashboard', 'login')->middleware(['XSS']);
Route::post('/login', 'AuthController@login')->middleware(['XSS']);
Route::get('/blog', 'BlogController@indexBlogs')->middleware(['XSS']);
Route::get('/blog/{slug}', 'BlogController@show')->middleware(['XSS']);

Route::middleware(['isAdmin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/blog');
    });
    Route::get('logout', 'AuthController@logout');
    Route::resource('blog', 'BlogController');
});



