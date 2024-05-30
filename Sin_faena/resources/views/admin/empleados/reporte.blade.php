<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .header,
        .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }

        .header {
            top: 0;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }

        .footer {
            bottom: 0;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .content {
            margin-top: 100px;
            margin-bottom: 50px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Sin Faena</h2>
        <p>Santiago de los Caballeros | Teléfono: (123) 456-7890</p>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} Sin Faena. Todos los derechos reservados.</p>
    </div>

    <div class="container">
        <div class="content">
            <div class="report-title">
                <h1>Reporte de Empleados</h1>
                <p>{{ date('d/m/Y') }}</p>
            </div>

            <h2>Listado de Empleados</h2>
            <table>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        @foreach ($users as $user)
                        @if ($user->id === $empleado->id_usuario)
                        <td>{{ $user->name }}</td>
                        @endif
                        @endforeach
                        <td>{{ $empleado->nombre_emp }}</td>
                        <td>{{ $empleado->apellido_emp }}</td>
                        <td>{{ $empleado->cedula }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
