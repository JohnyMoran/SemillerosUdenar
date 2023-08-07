@extends('adminlte::page')

@section('title', 'Participaciones en Eventos')

@section('content_header')
    <h1>Presentaciones de proyectos en eventos</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Participaciones</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.participaciones.create') }}" class="btn btn-primary">Agregar presentación</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Proyecto</th>
                                <th>Evento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participaciones as $participacion)
                                <tr>
                                    <td>{{ $participacion->id }}</td>
                                    <td>{{ $participacion->proyecto->titulo }}</td>
                                    <td>{{ $participacion->evento->nombre }}</td>
                                    
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.participaciones.show', $participacion) }}">Ver detalles</a>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.participaciones.edit', $participacion) }}">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.participaciones.destroy', $participacion) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar la participación en {{ $participacion->evento->nombre }}?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
