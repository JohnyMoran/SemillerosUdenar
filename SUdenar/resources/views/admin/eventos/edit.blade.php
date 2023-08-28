@extends('adminlte::page')

@section('title', 'Editar Evento')

@section('content_header')
    <h1>Editar evento</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    {!! Form::model($evento, ['route' => ['admin.eventos.update', $evento->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('codigo', 'Código') !!}
                            {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del evento', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del evento', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese una descripción del evento']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
                            {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha de Fin') !!}
                            {!! Form::date('fecha_fin', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lugar', 'Lugar') !!}
                            {!! Form::text('lugar', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lugar dónde se desarrollará el evento', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tipo', 'Tipo') !!}
                            {!! Form::select('tipo', ['' => 'Seleccione un tipo', 'Congreso' => 'Congreso', 'Encuentro' => 'Encuentro', 'Seminario' => 'Seminario', 'Taller' => 'Taller'], null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('modalidad', 'Modalidad') !!}
                            {!! Form::select('modalidad', ['' => 'Seleccione una modalidad', 'Virtual' => 'Virtual', 'Presencial' => 'Presencial', 'Hibrida' => 'Híbrida'], null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('clasificacion', 'Clasificación') !!}
                            {!! Form::select('clasificacion', ['' => 'Seleccione una clasificación', 'Local' => 'Local', 'Regional' => 'Regional', 'Nacional' => 'Nacional', 'Internacional' => 'Internacional'], null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('observaciones', 'Observaciones') !!}
                            {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Actualizar Evento', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
