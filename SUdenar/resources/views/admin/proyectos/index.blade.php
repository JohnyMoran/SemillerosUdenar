@extends('adminlte::page')

@section('title', 'Semilleros UDENAR FACING')

@section('content_header')
    <h1>Lista de Proyectos</h1>
    
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
            <a class="btn btn-success" href="{{route('admin.proyectos.create')}}">Agregar Proyectos</a>
            <a class="btn btn-primary" href="{{ route('admin.reports.proyectos_pdf') }}">Generar Reporte</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Tipo de proyecto</th>
                        <th>Estado</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{$proyecto->id}}</td>
                            <td>{{$proyecto->titulo}}</td>
                            <td>{{$proyecto->tipo_proyecto}}</td>
                            <td>{{$proyecto->estado}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.proyectos.show', $proyecto)}}">Ver detalles</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.proyectos.edit', $proyecto)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.proyectos.destroy', $proyecto) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar el proyecto: {{ $proyecto->titulo }}?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop