@extends('adminlte::page')

@section('title', 'Asignación de Coordinadores a Semilleros')

@section('content_header')
    <h1>Asignación de Coordinadores a Semilleros</h1>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Asignaciones</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.semillerocoordinador.create') }}" class="btn btn-primary">Asignar Nuevo Coordinador</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Semillero</th>
                                <th>Coordinador</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asignaciones as $semillerocoordinador)
                                <tr>
                                    <td>{{ $semillerocoordinador->id }}</td>
                                    <td>{{ $semillerocoordinador->semillero->nombre }}</td>
                                    <td>{{ $semillerocoordinador->coordinador->nombre }}</td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.semillerocoordinador.show', $semillerocoordinador) }}">Ver detalles</a>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.semillerocoordinador.edit', $semillerocoordinador) }}">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.semillerocoordinador.destroy', $semillerocoordinador) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar la asignación: {{ $semillerocoordinador->semillero->nombre }} con {{ $semillerocoordinador->coordinador->nombre }}?')">Eliminar</button>
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
