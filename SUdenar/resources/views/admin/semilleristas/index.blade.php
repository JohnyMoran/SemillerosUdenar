@extends('adminlte::page')

@section('title', 'Semilleristas UDENAR FACING')

@section('content_header')
    <h1>Lista de semilleristas</h1>
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

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{ route('admin.semilleristas.create') }}">Agregar semillerista</a>
            <a class="btn btn-primary" href="{{ route('admin.reports.semilleristas_pdf') }}">Generar Reporte</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Programa Académico</th>
                        <th>Estado</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($semilleristas as $semillerista)
                        <tr>
                            <td>{{ $semillerista->id }}</td>
                            <td>{{ $semillerista->nombre }}</td>
                            <td>{{ $semillerista->correo }}</td>
                            <td>{{ $semillerista->programa_academico }}</td>
                            <td>{{ $semillerista->estado }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.semilleristas.show', $semillerista) }}">Ver detalles</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.semilleristas.edit', $semillerista) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.semilleristas.destroy', $semillerista) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar el semillerista: {{ $semillerista->nombre }}?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop
