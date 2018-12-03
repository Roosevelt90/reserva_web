@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar reserva</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('reserva.update',$reserva->id) }}"  role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Numero de silla</label>
                                        <input value="{{$reserva->numeroSilla}}" type="number" name="numeroSilla" id="numeroSilla" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Clase</label>
                                    <select name="idClase" id="idClase" class="form-control input-sm">
                                        <option value="">Seleccione una opción</option>
                                        @foreach ($clase as $key)
                                        @if ($reserva->idClase == $key->id)
                                        <option value="{{$key->id}}" selected >{{$key->nombre}}</option>
                                        @else
                                        <option value="{{$key->id}}"  >{{$key->nombre}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Vuelo</label>
                                    <select name="idVuelo" id="idVuelo" class="form-control input-sm">
                                        <option value="">Seleccione una opción</option>
                                        @foreach ($vuelo as $key)
                                        @if ($reserva->idVuelo == $key->id)
                                        <option value="{{$key->id}}" selected >{{$key->id}}</option>
                                        @else
                                        <option value="{{$key->id}}"  >{{$key->id}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Observaciones </label>
                                        <textarea name="observaciones" id="observaciones" class="form-control input-sm">{{$reserva->observaciones}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Nombre(s)</label>
                                    <input type="text" name="nombre" value="{{$reserva->nombre}}" id="nombre" class="form-control input-sm" placeholder="">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" value="{{$reserva->apellido}}" name="apellido" id="apellido" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Tipo de documento</label>
                                    <select name="idTipoIdentificacion" id="idTipoIdentificacion" class="form-control input-sm">
                                        <option value="">Seleccione una opción</option>
                                        @foreach ($tipoIdentificacion as $key)
                                        @if ($reserva->idTipoIdentificacion == $key->id)
                                        <option value="{{$key->id}}" selected >{{$key->nombre}}</option>
                                        @else
                                        <option value="{{$key->id}}"  >{{$key->nombre}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Número de identidad</label>
                                        <input type="number" value="{{$reserva->numeroIdentificacion}}" name="numeroIdentificacion" id="numeroIdentificacion" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Equipaje extra</label>
                                        @if ($reserva->equipajeExtra == "1")
                                        <input type="checkbox"  name="equipajeExtra" id="equipajeExtra" class="form-control input-sm" placeholder="" checked="">
                                        @else
                                        <input type="checkbox"  name="equipajeExtra" id="equipajeExtra" class="form-control input-sm" placeholder="">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                    <a href="{{ route('aerolinea.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
