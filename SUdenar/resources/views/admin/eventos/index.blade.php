@extends('adminlte::page')

@section('title', 'Semilleros UDENAR FACING')

@section('content_header')
    <h1>Lista de eventos</h1>
    
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('admin.eventos.create')}}">Agregar Evento</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Tipo</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{$evento->id}}</td>
                            <td>{{$evento->nombre}}</td>
                            <td>{{$evento->lugar}}</td>
                            <td>{{$evento->tipo}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.eventos.show', $evento)}}">Ver detalles</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.eventos.edit', $evento)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.eventos.destroy', $evento) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar el evento: {{ $evento->nombre }}?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop
