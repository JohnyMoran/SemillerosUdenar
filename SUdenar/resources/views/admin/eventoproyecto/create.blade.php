@extends('adminlte::page')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <h3>Asignar Proyectos Participantes a un Evento</h3>

        {!! Form::open(['route' => 'admin.eventoproyecto.store', 'method' => 'post', 'id' => 'asignarProyectosForm']) !!}
        @csrf

        <div class="form-group">
            {!! Form::label('evento_id', 'Seleccionar Evento Existente') !!}
            {!! Form::select('evento_id', $eventosSinProyectos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un evento', 'required']) !!}
        </div>
        @error('evento_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seleccionarProyectosModal">
                Seleccionar Proyectos Participantes
            </button>
        </div>

        <div id="proyectos-seleccionados">
            <p><strong>Proyectos Seleccionados:</strong></p>
            <ul id="proyectos-list" class="list-group"></ul>
        </div>

        <div class="form-group">
            {!! Form::button('Asignar Proyectos', ['class' => 'btn btn-primary', 'id' => 'asignarProyectosBtn']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>

<!-- Modal para seleccionar proyectos -->
<div class="modal fade" id="seleccionarProyectosModal" tabindex="-1" role="dialog" aria-labelledby="seleccionarProyectosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seleccionarProyectosModalLabel">Seleccionar Proyectos Participantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenido de la ventana modal, lista de proyectos con checkbox -->
                <!-- Ejemplo: -->
                <ul class="list-group">
                @foreach($proyectosNombres as $proyectoId => $proyectoNombre)
                    <li class="list-group-item">
                        <input type="checkbox" class="proyecto-checkbox" name="proyectos[]" value="{{ $proyectoId }}" data-nombre="{{ $proyectoNombre }}">
                        {{ $proyectoNombre }}
                    </li>
                @endforeach

                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarProyectosBtn">Agregar Proyectos</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function () {
        var proyectosList = $('#proyectos-list');

        // Selector para el botón "Agregar Proyectos" dentro del formulario
        $('#agregarProyectosBtn').click(function () {
            // Obtener los IDs de los proyectos seleccionados
            var proyectosSeleccionados = [];
            $('.proyecto-checkbox:checked').each(function () {
                proyectosSeleccionados.push($(this).val());
            });

            // Mostrar los proyectos seleccionados en la lista
            proyectosList.empty();
            proyectosSeleccionados.forEach(function (proyectoId) {
                // Obtener el nombre del proyecto desde el atributo data-nombre del input
                var proyectoNombre = $('.proyecto-checkbox[value="' + proyectoId + '"]').data('nombre');
                proyectosList.append('<li class="list-group-item" data-id="' + proyectoId + '">' + proyectoNombre + '</li>');
            });

            // Cerrar la ventana modal
            $('#seleccionarProyectosModal').modal('hide');
        });

        // Selector para el botón "Asignar Proyectos" dentro del formulario
        $('#asignarProyectosBtn').click(function () {
            // Obtener los IDs de los proyectos seleccionados
            var proyectosSeleccionados = [];
            $('.proyecto-checkbox:checked').each(function () {
                proyectosSeleccionados.push($(this).val());
            });

            // Agregar los IDs de los proyectos seleccionados al formulario
            $('#proyectos-seleccionados').find('input[name="proyectos[]"]').remove();
            proyectosSeleccionados.forEach(function (proyectoId) {
                $('#proyectos-seleccionados').append('<input type="hidden" name="proyectos[]" value="' + proyectoId + '">');
            });

            // Enviar el formulario
            $('#asignarProyectosForm').submit();
        });
    });
</script>
@endsection
@endsection






