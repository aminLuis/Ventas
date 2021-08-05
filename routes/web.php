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

Route::resource('venta', 'VentasController')->middleware('auth');

Route::resource('cliente', 'ClienteController')->middleware('auth');

Route::get('inicio', function(){
    return view('cliente.inicio');
});


Route::get('listadoClientes', 'ClienteController@listadoClientes');

Route::get('listaVentas', 'VentasController@listaVentas');

Route::get('informeGeneral', 'VentasController@informeGeneral');

Route::get('ubicacion', function(){
    $datos = '';
    return view('cliente.ubicacion',compact('datos'));
});