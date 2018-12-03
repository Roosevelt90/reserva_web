@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Listado de reservas</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="/" class="btn btn-success" style="margin-right: 10px;">Inicio</a>
                            <a href="{{ route('reserva.create') }}" class="btn btn-info" >Añadir reserva</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>Número de reserva</th>
                            <th>Número de silla</th>
                            <th>Clase</th>
                            <th>Estado</th>
                            <th>Vuelo</th>
                            <th>Nombre de pasajero</th>
                            <th>Tipo de documento</th>
                            <th>Número de documento</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if($reservas->count())
                                @foreach($reservas as $key)
                                <tr>
                                    <td>{{$key->numeroReserva}}</td>
                                    <td>{{$key->numeroSilla}}</td>
                                    <td>{{$key->getClase()}}</td>
                                    <td>{{$key->getEstado()}}</td>
                                    <td>{{$key->getVuelo()}}</td>
                                    <td>{{$key->nombre}} {{$key->apellido}}</td>
                                    <td>{{$key->getTipoIdentidad()}}</td>
                                    <td>{{$key->numeroIdentificacion}}</td>

                                    <td>{{$key->observaciones}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('ReservaController@edit', $key->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                        <form action="{{action('ReservaController@destroy', $key->id)}}" method="post">
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
                {{ $reservas->links() }}
            </div>
        </div>
    </section>
    @endsection