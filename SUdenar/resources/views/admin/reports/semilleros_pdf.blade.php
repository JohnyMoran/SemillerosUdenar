<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Semilleros</title>
</head>
<body>
    <h1>Reporte de Semilleros</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Correo</th>
                <th style="padding: 10px;">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semilleros as $semillero)
                <tr>
                    <td style="padding: 10px;">{{ $semillero->id }}</td>
                    <td style="padding: 10px;">{{ $semillero->nombre }}</td>
                    <td style="padding: 10px;">{{ $semillero->correo }}</td>
                    <td style="padding: 10px;">{{ $semillero->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



