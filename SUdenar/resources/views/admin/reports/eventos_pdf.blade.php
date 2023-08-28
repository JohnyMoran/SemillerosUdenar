<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Eventos</title>
</head>
<body>
    <h1>Reporte de Eventos</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Lugar</th>
                <th style="padding: 10px;">Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
                <tr>
                    <td style="padding: 10px;">{{ $evento->id }}</td>
                    <td style="padding: 10px;">{{ $evento->nombre }}</td>
                    <td style="padding: 10px;">{{ $evento->lugar }}</td>
                    <td style="padding: 10px;">{{ $evento->tipo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

