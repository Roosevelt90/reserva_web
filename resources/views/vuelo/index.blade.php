@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Listado de vuelos</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="/" class="btn btn-success" style="margin-right: 10px;">Inicio</a>
                            <a href="{{ route('vuelo.create') }}" class="btn btn-info" >Añadir vuelo</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>Precio</th>
                            <th>Cantidad de sillas</th>
                            <th>Fecha y hora de salida</th>
                            <th>Aerolinea</th>
                            <th>Ciudad de origen</th>
                            <th>Ciudad destino</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if($vuelos->count())
                                @foreach($vuelos as $key)
                                <tr>
                                    <td>${{$key->precio}}</td>
                                    <td>{{$key->cantidadSillas}}</td>
                                    <td>{{$key->fechaHoraSalida}}</td>
                                    <td>{{$key->getAerolinea()}}</td>
                                    <td>{{$key->getCiudadOrigen()}}</td>
                                    <td>{{$key->getCiudadDestino()}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('VueloController@edit', $key->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                        <form action="{{action('VueloController@destroy', $key->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8">No hay registro !!</td>
                                </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
                {{ $vuelos->links() }}
            </div>
        </div>
    </section>
    @endsection