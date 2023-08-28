@extends('adminlte::page')

@section('title', 'Agregar Semillerista')

@section('content_header')
    <h1>Agregar Semillerista</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.semilleristas.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                    @csrf

                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre') !!}
                        {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('identificacion', 'Identificación') !!}
                        {!! Form::text('identificacion', old('identificacion'), ['class' => 'form-control', 'required', 'unique:semilleristas']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('codigo_estudiantil', 'Código Estudiantil') !!}
                        {!! Form::text('codigo_estudiantil', old('codigo_estudiantil'), ['class' => 'form-control', 'required', 'unique:semilleristas']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('direccion', 'Dirección') !!}
                        {!! Form::text('direccion', old('direccion'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('telefono', 'Teléfono') !!}
                        {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('correo', 'Correo Electrónico') !!}
                        {!! Form::email('correo', old('correo'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('genero', 'Género') !!}
                        {!! Form::select('genero', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Otro' => 'Otro'], old('genero'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
                        {!! Form::date('fecha_nacimiento', old('fecha_nacimiento'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('semestre', 'Semestre') !!}
                        {!! Form::number('semestre', old('semestre'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" required>
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="reporte_matricula">Reporte de Matrícula (PDF)</label>
                        <input type="file" name="reporte_matricula" class="form-control @error('reporte_matricula') is-invalid @enderror" required>
                        @error('reporte_matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('programa_academico', 'Programa Académico') !!}
                        {!! Form::text('programa_academico', old('programa_academico'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('semillero_id', 'Semillero') !!}
                        {!! Form::select('semillero_id', $semilleros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un semillero', 'required']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('fecha_vinculacion', 'Fecha de Vinculación') !!}
                        {!! Form::date('fecha_vinculacion', old('fecha_vinculacion'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    
                    <div class="form-group">
                        {!! Form::label('estado', 'Estado') !!}
                        {!! Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], old('estado'), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

