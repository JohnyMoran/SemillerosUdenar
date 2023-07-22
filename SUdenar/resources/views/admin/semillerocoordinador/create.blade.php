@extends('adminlte::page')

@section('title', 'Asignar Coordinador a Semillero')

@section('content_header')
    <h1>Asignar Coordinador a Semillero</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'admin.semillerocoordinador.store', 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('semillero_id', 'Semillero') !!}
                            {!! Form::select('semillero_id', $semilleros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un semillero', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('coordinador_id', 'Coordinador') !!}
                            {!! Form::select('coordinador_id', $coordinadores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un coordinador', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Asignar Coordinador', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

