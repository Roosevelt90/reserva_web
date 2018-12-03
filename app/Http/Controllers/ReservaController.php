<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reserva;
use App\pasajero;
use App\clase;
use App\estado;
use App\vuelo;
use App\tipoIdentificacion;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = reserva::select("reserva.*", "pasajero.nombre", "pasajero.idTipoIdentificacion",
                "pasajero.apellido", "pasajero.numeroIdentificacion")->join("pasajero",
                "pasajero.id", "=", "reserva.idPasajero")->orderBy('id', 'DESC')->paginate(5);
        return view('reserva.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vuelo              = vuelo::all();
        $clase              = clase::all();
        $tipoIdentificacion = tipoIdentificacion::all();
        return view('reserva.create',
            ["vuelo" => $vuelo, "clase" => $clase, "tipoIdentificacion" => $tipoIdentificacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $this->validate($request,
            ['nombre' => 'required', 'apellido' => 'required', 'idTipoIdentificacion' => 'required',
            'numeroIdentificacion' => 'required', 'idClase' => 'required', 'idVuelo' => 'required',
            'numeroSilla' => 'required', 'observaciones' => 'required']);
        try {
            $request->merge(['idEstado' => 1]);

            $data                           = $request->all();
            $pasajero                       = new pasajero();
            $pasajero->nombre               = $data['nombre'];
            $pasajero->apellido             = $data['apellido'];
            $pasajero->idTipoIdentificacion = $data['idTipoIdentificacion'];
            $pasajero->numeroIdentificacion = $data['numeroIdentificacion'];
            $pasajero->save();

            $reserva                = new reserva();
            $reserva->numeroReserva = $this->getNumeroReserva();
            $reserva->numeroSilla   = $data['numeroSilla'];
            $reserva->observaciones = $data['observaciones'];
            $reserva->idClase       = $data['idClase'];
            $reserva->idPasajero    = $pasajero->id;
            $reserva->idEstado      = $data['idEstado'];
            $reserva->idVuelo       = $data['idVuelo'];
            $reserva->equipajeExtra = ((isset($data['equipajeExtra']) && $data['equipajeExtra'] == "on")
                    ? 1 : 0);
            $reserva->save();
            DB::commit();
            return redirect()->route('reserva.index')->with('success', 'Registro del vuelo exitoso');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
    }

    public function getNumeroReserva()
    {
        $numeroReserva = reserva::select('numeroReserva')->orderBy('id', 'DESC')->first()['numeroReserva'];
        if (!isset($numeroReserva)) {
            $numeroReserva = 1;
            return str_pad($numeroReserva, 5, "0", STR_PAD_LEFT);
        } else {
            $next = $numeroReserva + 1;
            return str_pad($next, 5, "0", STR_PAD_LEFT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = reserva::find($id);
        return view('reserva.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva            = reserva::select("reserva.*", "pasajero.nombre",
                "pasajero.idTipoIdentificacion", "pasajero.apellido",
                "pasajero.numeroIdentificacion")->join("pasajero", "pasajero.id", "=",
                "reserva.idPasajero")->where("reserva.id", $id)->first();
        $vuelo              = vuelo::all();
        $clase              = clase::all();
        $tipoIdentificacion = tipoIdentificacion::all();
        return view('reserva.edit',
            ["reserva" => $reserva, "vuelo" => $vuelo, "clase" => $clase, "tipoIdentificacion" => $tipoIdentificacion]);
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
        DB::beginTransaction();
        $this->validate($request,
            ['nombre' => 'required', 'apellido' => 'required', 'idTipoIdentificacion' => 'required',
            'numeroIdentificacion' => 'required', 'idClase' => 'required', 'idVuelo' => 'required',
            'numeroSilla' => 'required', 'observaciones' => 'required']);
        try {
            $reserva  = reserva::find($id);
            $pasajero = pasajero::find($reserva->idPasajero);

            $data                           = $request->all();
            $pasajero->nombre               = $data['nombre'];
            $pasajero->apellido             = $data['apellido'];
            $pasajero->idTipoIdentificacion = $data['idTipoIdentificacion'];
            $pasajero->numeroIdentificacion = $data['numeroIdentificacion'];
            $pasajero->save();

            $reserva->numeroSilla   = $data['numeroSilla'];
            $reserva->observaciones = $data['observaciones'];
            $reserva->idClase       = $data['idClase'];
            $reserva->idPasajero    = $pasajero->id;
            $reserva->idVuelo       = $data['idVuelo'];
            $reserva->equipajeExtra = ((isset($data['equipajeExtra']) && $data['equipajeExtra'] == "on")
                    ? 1 : 0);
            $reserva->save();
            DB::commit();
            return redirect()->route('reserva.index')->with('success', 'Registro del vuelo exitoso');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $reserva  = reserva::find($id);
            $pasajero = pasajero::find($reserva->idPasajero);
            $reserva->delete();
            $pasajero->delete();
            DB::commit();
            return redirect()->route('reserva.index')->with('success',
                    'Registro eliminado satisfactoriamente');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
    }

}