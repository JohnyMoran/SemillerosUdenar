@extends('adminlte::page')

@section('title', 'Editar Semillero')

@section('content_header')
    <h1>Editar Semillero</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    {!! Form::model($semillero, ['route' => ['admin.semilleros.update', $semillero->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('correo', 'Correo') !!}
                            {!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('logo', 'Logo') !!}
                            {!! Form::file('logo', ['class' => 'form-control-file']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese una descripción del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('mision', 'Misión') !!}
                            {!! Form::textarea('mision', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese la misión del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('vision', 'Visión') !!}
                            {!! Form::textarea('vision', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese la visión del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('valores', 'Valores') !!}
                            {!! Form::textarea('valores', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese los valores del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('objetivos', 'Objetivos') !!}
                            {!! Form::textarea('objetivos', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese los objetivos del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lineas_investigacion', 'Líneas de Investigación') !!}
                            {!! Form::textarea('lineas_investigacion', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese las líneas de investigación del semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('archivo_presentacion', 'Archivo de Presentación (PDF)') !!}
                            {!! Form::file('archivo_presentacion', ['class' => 'form-control-file', 'accept' => 'application/pdf', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('numero_resolucion_creacion', 'Número de Resolución de Creación') !!}
                            {!! Form::text('numero_resolucion_creacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de resolución de creación', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_resolucion_creacion', 'Fecha de Resolución de Creación') !!}
                            {!! Form::date('fecha_resolucion_creacion', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('archivo_resolucion_creacion', 'Archivo de Resolución (PDF)') !!}
                            {!! Form::file('archivo_resolucion_creacion', ['class' => 'form-control-file', 'accept' => 'application/pdf', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar Semillero', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop