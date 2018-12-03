<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vuelo;
use App\aerolinea;
use App\ciudad;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos = vuelo::orderBy('id', 'DESC')->paginate(5);
        return view('vuelo.index', compact('vuelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aerolinea = aerolinea::all();
        $ciudad    = ciudad::all();
        return view('vuelo.create', ["aerolinea" => $aerolinea, "ciudad" => $ciudad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            ['precio' => 'required', 'cantidadSillas' => 'required', 'fechaHoraSalida' => 'required',
            'idAerolinea' => 'required',
            'idCiudadOrigen' => 'required', 'idCiudadDestino' => 'required']);
        vuelo::create($request->all());
        return redirect()->route('vuelo.index')->with('success', 'Registro del vuelo exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vuelo = vuelo::find($id);
        return view('vuelo.show', compact('vuelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vuelo     = vuelo::find($id);
        $aerolinea = aerolinea::all();
        $ciudad    = ciudad::all();       
//        return view('vuelo.edit', compact('vuelo', 'aerolinea', 'ciudad'));
        return view('vuelo.edit',
            ["aerolinea" => $aerolinea, "ciudad" => $ciudad, "vuelo" => $vuelo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            ['precio' => 'required', 'cantidadSillas' => 'required', 'fechaHoraSalida' => 'required',
            'idAerolinea' => 'required',
            'idCiudadOrigen' => 'required', 'idCiudadDestino' => 'required']);
        vuelo::find($id)->update($request->all());
        return redirect()->route('vuelo.index')->with('success',
                'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        vuelo::find($id)->delete();
        return redirect()->route('vuelo.index')->with('success',
                'Registro eliminado satisfactoriamente');
    }

}