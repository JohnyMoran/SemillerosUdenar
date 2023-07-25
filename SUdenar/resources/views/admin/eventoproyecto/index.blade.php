@extends('adminlte::page')

@section('title', 'Vinculación de proyecto a un evento')

@section('content_header')
    <h1>Vinculación de proyecto a un evento</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de vinculaciones</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.eventoproyecto.create') }}" class="btn btn-primary">Realizar nueva vinculación</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Evento</th>
                                <th>Proyectos Vinculados</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventosConProyectos as $eventoId => $datosEvento)
                                <tr>
                                    <td>{{ $datosEvento['evento']->id }}</td>
                                    <td>{{ $datosEvento['evento']->nombre }}</td>
                                    <td>
                                        @foreach ($datosEvento['proyectos'] as $proyecto)
                                            <li>{{ $proyecto->titulo }}</li>
                                        @endforeach
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.eventoproyecto.show', $eventoId) }}">Ver detalles</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.eventoproyecto.edit', $eventoId) }}">Editar</a>
                                        <form action="{{ route('admin.eventoproyecto.destroy', $eventoId) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar la vinculación de todos los proyectos al evento: {{ $datosEvento['evento']->nombre }}?')">Eliminar</button>
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


