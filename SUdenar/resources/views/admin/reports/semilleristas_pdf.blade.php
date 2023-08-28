<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Semilleristas</title>
</head>
<body>
    <h1>Reporte de Semilleristas</h1>
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
            @foreach ($semilleristas as $semillerista)
                <tr>
                    <td style="padding: 10px;">{{ $semillerista->id }}</td>
                    <td style="padding: 10px;">{{ $semillerista->nombre }}</td>
                    <td style="padding: 10px;">{{ $semillerista->identificacion }}</td>
                    <td style="padding: 10px;">{{ $semillerista->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
