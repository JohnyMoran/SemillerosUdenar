@extends('adminlte::page')

@section('title', 'Editar Proyecto')

@section('content_header')
    <h1>Editar proyecto</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($proyecto, ['route' => ['admin.proyectos.update', $proyecto], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('codigo', 'Código del Proyecto') !!}
                            {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del proyecto', 'required']) !!}
                        </div>
                        @error('codigo')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            {!! Form::label('titulo', 'Título del Proyecto') !!}
                            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del proyecto', 'required']) !!}
                        </div>
                        @error('titulo')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            {!! Form::label('tipo_proyecto', 'Tipo de Proyecto') !!}
                            {!! Form::select('tipo_proyecto', [
                                'investigacion' => 'Proyecto de Investigación',
                                'innovacion' => 'Proyecto de Innovación y Desarrollo',
                                'emprendimiento' => 'Proyecto de Emprendimiento',
                            ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de proyecto', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('estado', 'Estado del Proyecto') !!}
                            {!! Form::select('estado', [
                                'propuesta' => 'Propuesta',
                                'en_curso' => 'En Curso',
                                'terminado' => 'Terminado',
                            ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el estado del proyecto', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
                            {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fecha_finalizacion', 'Fecha de Finalización') !!}
                            {!! Form::date('fecha_finalizacion', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('archivo_propuesta', 'Archivo de Propuesta (PDF)') !!}
                            {!! Form::file('archivo_propuesta', ['class' => 'form-control-file']) !!}
                            <small class="form-text text-muted">Si desea actualizar el archivo, seleccione uno nuevo. De lo contrario, deje este campo vacío.</small>
                        </div>
                        @if ($proyecto->archivo_propuesta)
                            <div class="form-group">
                                <a href="{{ asset('storage/' . $proyecto->archivo_propuesta) }}" target="_blank">Ver Archivo Actual</a>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('archivo_proyecto_final', 'Archivo de Proyecto Final (PDF)') !!}
                            {!! Form::file('archivo_proyecto_final', ['class' => 'form-control-file']) !!}
                            <small class="form-text text-muted">Si desea actualizar el archivo, seleccione uno nuevo. De lo contrario, deje este campo vacío.</small>
                        </div>
                        @if ($proyecto->archivo_proyecto_final)
                            <div class="form-group">
                                <a href="{{ asset('storage/' . $proyecto->archivo_proyecto_final) }}" target="_blank">Ver Archivo Actual</a>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::submit('Actualizar Proyecto', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop