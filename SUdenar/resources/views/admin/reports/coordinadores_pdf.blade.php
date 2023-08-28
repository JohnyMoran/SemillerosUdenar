<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Coordinadores</title>
</head>
<body>
    <h1>Reporte de Coordinadores</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Identificación</th>
                <th style="padding: 10px;">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coordinadores as $coordinador)
                <tr>
                    <td style="padding: 10px;">{{ $coordinador->id }}</td>
                    <td style="padding: 10px;">{{ $coordinador->nombre }}</td>
                    <td style="padding: 10px;">{{ $coordinador->identificacion }}</td>
                    <td style="padding: 10px;">{{ $coordinador->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
