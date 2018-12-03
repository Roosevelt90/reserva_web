<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pasajero;
use App\clase;
use App\estado;
use App\vuelo;
use App\tipoIdentificacion;

class reserva extends Model
{
    protected $table      = "reserva";
    protected $primarykey = "id";
    protected $guarded    = array();

    public function getVuelo()
    {
        return $vuelo = vuelo::select("id")->where("id", $this->idVuelo)->first()['id'];
    }

    public function getEstado()
    {
        return "Activa";
    }

    public function getClase()
    {
        return $clase = clase::select("nombre")->where("id", $this->idClase)->first()['nombre'];
    }

    public function getTipoIdentidad()
    {
        return $tipoIdentificacion = tipoIdentificacion::select("nombre")->where("id", $this->idTipoIdentificacion)->first()['nombre'];
    }

}