
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
                    <h3 class="panel-title">Nuevo vuelo</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('vuelo.store') }}"  role="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="number" name="precio" id="precio" class="form-control input-sm" placeholder="Precio">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad de sillas disponibles</label>
                                        <input type="number" name="cantidadSillas" id="cantidadSillas" class="form-control input-sm" placeholder="Cantidad de sillas">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Fecha y hora de salida</label>
                                        <input type="datetime-local" name="fechaHoraSalida" id="fechaHoraSalida" class="form-control input-sm" placeholder="Fecha y hora">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Aerolinea</label>
                                        <select name="idAerolinea" id="idAerolinea" class="form-control input-sm">
                                            <option value="">Seleccione una opción</option>
                                            @foreach ($aerolinea as $key)
                                            <option value="{{$key->id}}">{{$key->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad de origen</label>
                                        <select name="idCiudadOrigen" id="idCiudadOrigen" class="form-control input-sm">
                                            <option value="">Seleccione una opción</option>
                                            @foreach ($ciudad as $key)
                                            <option value="{{$key->id}}">{{$key->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad destino</label>
                                        <select name="idCiudadDestino" id="idCiudadDestino" class="form-control input-sm">
                                            <option value="">Seleccione una opción</option>
                                            @foreach ($ciudad as $key)
                                            <option value="{{$key->id}}">{{$key->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Guardar" class="btn btn-success btn-block">
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