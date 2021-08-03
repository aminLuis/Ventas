<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function(){
    return view('venta.index');
});

Route::resource('venta', VentasController::class);

Route::resource('cliente', ClienteController::class);

Route::get('inicio', function(){
    return view('cliente.inicio');
});


Route::get('listadoClientes', 'ClienteController@listadoClientes');

Route::get('listaVentas', 'VentasController@listaVentas');

Route::get('informeGeneral', 'VentasController@informeGeneral');

Route::get('ubicacion', function(){
    return view('cliente.ubicacion');
});