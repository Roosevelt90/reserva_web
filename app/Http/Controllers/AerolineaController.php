<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aerolinea;

class AerolineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aerolineas = aerolinea::orderBy('id', 'DESC')->paginate(5);
        return view('aerolinea.index', compact('aerolineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aerolinea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required']);
        aerolinea::create($request->all());
        return redirect()->route('aerolinea.index')->with('success',
                'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aerolinea = aerolinea::find($id);
        return view('aerolinea.show', compact('aerolinea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aerolinea = aerolinea::find($id);
        return view('aerolinea.edit', compact('aerolinea'));
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
        $this->validate($request, ['nombre' => 'required']);
        aerolinea::find($id)->update($request->all());
        return redirect()->route('aerolinea.index')->with('success',
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
        aerolinea::find($id)->delete();
        return redirect()->route('aerolinea.index')->with('success',
                'Registro eliminado satisfactoriamente');
    }

}