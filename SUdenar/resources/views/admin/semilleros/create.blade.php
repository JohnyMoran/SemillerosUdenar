@extends('adminlte::page')

@section('title', 'Semilleros UDENAR FACING')

@section('content_header')
    <h1>Crear nuevo semillero</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.semilleros.store', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del semillero']) !!}
                </div>

                @error('nombre')
                    <span class='text-danger'>{{$message}}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('correo', 'Correo') !!}
                    {!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@udenar.edu.co']) !!}
                </div>

                @error('correo')
                    <span class='text-danger'>{{$message}}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('logo', 'Logo del Semillero(jpeg,png,jpg,gif)') !!}
                    {!! Form::file('logo', ['class' => 'form-control-file']) !!}
                </div>

                @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del semillero', 'rows' => 4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mision', 'Misión') !!}
                    {!! Form::textarea('mision', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la misión del semillero', 'rows' => 4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('vision', 'Visión') !!}
                    {!! Form::textarea('vision', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la visión del semillero', 'rows' => 4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('valores', 'Valores') !!}
                    {!! Form::textarea('valores', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los valores del semillero', 'rows' => 4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivos', 'Objetivos') !!}
                    {!! Form::textarea('objetivos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los objetivos del semillero', 'rows' => 4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('lineas_investigacion', 'Líneas de Investigación') !!}
                    {!! Form::textarea('lineas_investigacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las líneas de investigación del semillero', 'rows' => 4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('archivo_presentacion', 'Archivo de Presentación (PDF)') !!}
                    {!! Form::file('archivo_presentacion', ['class' => 'form-control-file']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('numero_resolucion_creacion', 'Número de Resolución') !!}
                    {!! Form::text('numero_resolucion_creacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de resolución']) !!}
                </div>

                @error('numero_resolucion_creacion')
                    <span class='text-danger'>{{$message}}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('fecha_resolucion_creacion', 'Fecha de Resolución') !!}
                    {!! Form::date('fecha_resolucion_creacion', null, ['class' => 'form-control']) !!}
                </div>

                @error('fecha_resolucion_creacion')
                    <span class='text-danger'>{{$message}}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('archivo_resolucion_creacion', 'Archivo de resolución (PDF)') !!}
                    {!! Form::file('archivo_resolucion_creacion', ['class' => 'form-control-file']) !!}
                </div>

                {!! Form::submit('Crear Semillero', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola desde el panel de administración'); </script>
@stop
