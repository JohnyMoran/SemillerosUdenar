@extends('adminlte::page')

@section('title', 'Semilleros UDENAR FACING')

@section('content_header')
    <h1>Lista de Semilleros</h1>
    
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
            <a class="btn btn-success" href="{{route('admin.semilleros.create')}}">Agregar Semillero</a>
            <a class="btn btn-primary" href="{{ route('admin.reports.semilleros_pdf') }}">Generar Reporte</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="1"></th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Coordinador Asignado</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($semilleros as $semillero)
                        <tr>
                            <td><img src="{{ asset('storage/' . $semillero->logo) }}" alt="Logo del Semillero"></td>
                            <td>{{$semillero->id}}</td>
                            <td>{{$semillero->nombre}}</td>
                            <td>{{$semillero->coordinadorAsignado ? $semillero->coordinadorAsignado->coordinador->nombre : 'No asignado'}}</td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.semilleros.show', $semillero)}}">Ver detalles</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.semilleros.edit', $semillero)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.semilleros.destroy', $semillero) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar el semillero: {{ $semillero->nombre }}?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

