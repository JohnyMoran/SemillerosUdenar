@extends('adminlte::page')

@section('title', 'Crear Coordinador')

@section('content_header')
    <h1>Crear nuevo coordinador</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    {!! Form::open(['route' => 'admin.coordinadores.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del coordinador', 'required']) !!}
                        </div>
                        @error('nombre')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            {!! Form::label('identificacion', 'Identificación') !!}
                            {!! Form::text('identificacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la identificación del coordinador', 'required']) !!}
                        </div>
                        @error('identificacion')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección del coordinador', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('telefono', 'Teléfono') !!}
                            {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono del coordinador', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('correo', 'Correo') !!}
                            {!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@udenar.edu.co', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('genero', 'Género') !!}
                            {!! Form::select('genero', ['' => 'Seleccione el género', 'Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Otro' => 'Otro'], null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
                            {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('programa_academico', 'Programa Académico') !!}
                            {!! Form::text('programa_academico', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el programa académico del coordinador', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('areas_conocimiento', 'Áreas de Conocimiento') !!}
                            {!! Form::text('areas_conocimiento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las áreas de conocimiento del coordinador', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_vinculacion', 'Fecha de Vinculación') !!}
                            {!! Form::date('fecha_vinculacion', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('acuerdo_nombramiento', 'Acuerdo de Nombramiento') !!}
                            {!! Form::file('acuerdo_nombramiento', ['class' => 'form-control-file', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('foto', 'Foto Coordinador(jpeg,png,jpg,gif)') !!}
                            {!! Form::file('foto', ['class' => 'form-control-file']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Crear Coordinador', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
