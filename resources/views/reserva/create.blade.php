
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
                    <h3 class="panel-title">Nueva reserva</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('reserva.store') }}"  role="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Numero de silla</label>
                                        <input type="number" name="numeroSilla" id="numeroSilla" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Clase</label>
                                    <select name="idClase" id="idClase" class="form-control input-sm">
                                        <option value="">Seleccione una opción</option>
                                        @foreach ($clase as $key)
                                        <option value="{{$key->id}}">{{$key->nombre}}</option>
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
                                        <option value="{{$key->id}}">{{$key->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <textarea name="observaciones" id="observaciones" class="form-control input-sm"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Nombre(s)</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label>Tipo de documento</label>
                                    <select name="idTipoIdentificacion" id="idTipoIdentificacion" class="form-control input-sm">
                                        <option value="">Seleccione una opción</option>
                                        @foreach ($tipoIdentificacion as $key)
                                        <option value="{{$key->id}}">{{$key->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Número de identidad</label>
                                        <input type="number" name="numeroIdentificacion" id="numeroIdentificacion" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Equipaje extra</label>
                                        <input type="checkbox" name="equipajeExtra" id="equipajeExtra" class="form-control input-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                    <a href="{{ route('reserva.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection