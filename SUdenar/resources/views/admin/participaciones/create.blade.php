@extends('adminlte::page')

@section('title', 'Asignar Proyecto a Evento')

@section('content_header')
    <h1>Asignar Proyecto a Evento</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.participaciones.store', 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('evento_id', 'Evento') !!}
                            {!! Form::select('evento_id', $eventos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un evento', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('proyecto_id', 'Proyecto') !!}
                            {!! Form::select('proyecto_id', $proyectos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un proyecto', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('semillero_id', 'Semillero') !!}
                            {!! Form::select('semillero_id', $semilleros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('semillerista_id', 'Semillerista') !!}
                            {!! Form::select('semillerista_id', $semilleristas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un semillerista', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tipo_participacion', 'Tipo de Participación') !!}
                            {!! Form::text('tipo_participacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el tipo de participación', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('calificacion', 'Calificación') !!}
                            {!! Form::number('calificacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la calificación']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('archivo_certificacion', 'Archivo de Certificación') !!}
                            {!! Form::file('archivo_certificacion', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('evidencias', 'Evidencias') !!}
                            {!! Form::file('evidencias', ['class' => 'form-control-file', 'accept' => '.jpg,.jpeg,.png,.pdf,.zip', 'multiple']) !!}
                            <small class="form-text text-muted">Puedes adjuntar fotografías, documentos PDF y archivos ZIP.</small>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Asignar Proyecto a Evento', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
