@extends('adminlte::page')

@section('title', 'Semilleros UDENAR FACING')

@section('content_header')
    <h1>Lista de coordinadores</h1>
    
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
            <a class="btn btn-success" href="{{route('admin.coordinadores.create')}}">Agregar coordinador</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Prog. Académico</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($coordinadores as $coordinadore)
                        <tr>
                            <td>{{$coordinadore->id}}</td>
                            <td>{{$coordinadore->nombre}}</td>
                            <td>{{$coordinadore->correo}}</td>
                            <td>{{$coordinadore->programa_academico}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.coordinadores.show', $coordinadore)}}">Ver detalles</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.coordinadores.edit', $coordinadore)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.coordinadores.destroy', $coordinadore) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar el usuario: {{ $coordinadore->nombre }}?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop