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
Route::view('/', 'welcome');
Route::view('/home', 'landing');
Route::view('/dajala', 'about');
Route::view('/servicios', 'services');
Route::view('/contacto', 'contact');



