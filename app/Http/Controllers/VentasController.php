<?php

namespace App\Http\Controllers;

use App\ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function listaVentas()
    {
        return ventas::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        ventas::insert($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ventas::where('id','=',$id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $total = ventas::destroy($id);
    }

    public function informeGeneral(){
        
        $fechaActual = date('Y-m-d');

        $total       = ventas::where('fecha','=',$fechaActual)->count();
        $mayor       = ventas::max('total');
        $menor       = ventas::orderBy('total')->first();
        $suma        = ventas::sum('total');
        $totalVentas = ventas::all('total')->count();

        $promedioVentas = 0;
        if($total>0){
            $promedioVentas = $suma / $totalVentas;
        }

        return response()->json([
            'total'          => $total,
            'mayor'          => $mayor,
            'menor'          => $menor->total,
            'suma'           => $suma,
            'promedioVentas' => $promedioVentas,
            'fechaActual'    => $fechaActual
        ]); 

    }
}
