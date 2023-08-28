<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Participaciones en Eventos</title>
</head>
<body>
    <h1>Reporte de Participaciones en Eventos</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Evento</th>
                <th style="padding: 10px;">Proyecto</th>
                <th style="padding: 10px;">Semillero</th>
                <th style="padding: 10px;">Semillerista</th>
                <th style="padding: 10px;">Tipo de Participación</th>
                <th style="padding: 10px;">Calificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participaciones as $participacion)
                <tr>
                    <td style="padding: 10px;">{{ $participacion->id }}</td>
                    <td style="padding: 10px;">{{ $participacion->evento->nombre }}</td>
                    <td style="padding: 10px;">{{ $participacion->proyecto->titulo }}</td>
                    <td style="padding: 10px;">{{ $participacion->semillero->nombre }}</td>
                    <td style="padding: 10px;">{{ $participacion->semillerista->nombre }}</td>
                    <td style="padding: 10px;">{{ $participacion->tipo_participacion }}</td>
                    <td style="padding: 10px;">{{ $participacion->calificacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
