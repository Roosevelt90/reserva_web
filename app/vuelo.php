<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\aerolinea;
use App\ciudad;

class vuelo extends Model
{
    protected $table      = "vuelo";
    protected $primarykey = "id";
    protected $guarded    = array();

    public function getAerolinea()
    {
        return $aerolinea = aerolinea::select("nombre")->where("id", $this->idAerolinea)->first()['nombre'];
    }

    public function getCiudadOrigen()
    {
        return $ciudad = ciudad::select("nombre")->where("id", $this->idCiudadOrigen)->first()['nombre'];
    }

    public function getCiudadDestino()
    {
        return $ciudad = ciudad::select("nombre")->where("id", $this->idCiudadDestino)->first()['nombre'];
    }

}