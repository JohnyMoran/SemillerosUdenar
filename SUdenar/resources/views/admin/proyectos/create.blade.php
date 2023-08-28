@extends('adminlte::page')

@section('title', 'Crear Proyecto')

@section('content_header')
    <h1>Crear nuevo proyecto</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.proyectos.store', 'enctype' => 'multipart/form-data']) !!}
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
                            {!! Form::label('integrantes', 'Integrantes') !!}
                            <div class="form-group">
                                <label>Semilleristas Seleccionados</label>
                                <ul id="semilleristas-seleccionados-list">
                                    <!-- Aquí se mostrarán los semilleristas seleccionados -->
                                </ul>
                            </div>

                            <input type="hidden" name="integrantes" id="integrantes" value="">
                            <button type="button" class="btn btn-primary" id="elegir-integrantes-link">Agregar Integrantes</button>

                            <div id="elegir-integrantes-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="elegir-integrantes-modal-label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="elegir-integrantes-modal-label">Elegir Integrantes (Máximo 5)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="semilleristas-list">
                                                @foreach ($semilleristas as $semillerista)
                                                    <div class="form-group">
                                                        {!! Form::label('integrantes', 'Integrantes') !!}
                                                        {!! Form::checkbox('integrantes[]', $semillerista->id, null, ['class' => 'form-check-input']) !!}
                                                        {!! Form::label('integrantes', $semillerista->nombre) !!}
                                                    </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" id="aceptar-integrantes">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                            {!! Form::file('archivo_propuesta', ['class' => 'form-control-file', 'required']) !!}
                        </div>
                        @error('archivo_propuesta')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            {!! Form::label('archivo_proyecto_final', 'Archivo de Proyecto Final (PDF)') !!}
                            {!! Form::file('archivo_proyecto_final', ['class' => 'form-control-file']) !!}
                        </div>

                        {!! Form::submit('Crear Proyecto', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>   
@stop

@section('css')
    
@stop

@section('js')
    <script>
        $(document).ready(function () {
            var selectedSemilleristas = [];

            $('#elegir-integrantes-link').on('click', function () {
                // Abre el modal
                $('#elegir-integrantes-modal').modal('show');
            });

            $('#aceptar-integrantes').on('click', function () {
                // Obtiene los elementos seleccionados
                $('.semillerista-item.selected').each(function () {
                    selectedSemilleristas.push($(this).data('id'));
                });

                // Actualiza el campo oculto con los IDs de los semilleristas
                $('#integrantes').val(JSON.stringify(selectedSemilleristas));

                // Cierra el modal y limpia la selección
                $('#elegir-integrantes-modal').modal('hide');
                $('.semillerista-item').removeClass('selected');
                selectedSemilleristas = [];
            });

            $('.semillerista-item').on('click', function () {
                // Manejar la selección/deselección de semilleristas
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    if (selectedSemilleristas.length < 5) {
                        $(this).addClass('selected');
                    } else {
                        alert('Ya ha seleccionado el máximo de 5 semilleristas.');
                    }
                }
            });
        });
    </script>
@stop



