<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Proyectos</title>
</head>
<body>
    <h1>Reporte de Proyectos</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Código</th>
                <th style="padding: 10px;">Título</th>
                <th style="padding: 10px;">Tipo de Proyecto</th>
                <th style="padding: 10px;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
                <tr>
                    <td style="padding: 10px;">{{ $proyecto->id }}</td>
                    <td style="padding: 10px;">{{ $proyecto->codigo }}</td>
                    <td style="padding: 10px;">{{ $proyecto->titulo }}</td>
                    <td style="padding: 10px;">{{ $proyecto->tipo_proyecto }}</td>
                    <td style="padding: 10px;">{{ $proyecto->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
