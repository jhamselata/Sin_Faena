<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte mensual de Eventos</title>


    <style>

        body {
            font-family: 'Courier New', Courier, monospace;
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
            margin-top: 150px;
            margin-bottom: 50px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 8px;
            padding: 0;
        }

        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }

         span {
            color: #FF751F;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #d0d0d0;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #000000d2;
            color: #ff8c44
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Sin <span>Faena</span></h1>
        <p>Santiago de los Caballeros | <strong>Teléfono:</strong> (849) 398-4871</p>
        <p><strong>Correo electrónico:</strong> sinfaena@gmail.com</p>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} Sin Faena. Todos los derechos reservados.</p>
    </div>

    <div class="container">
        <div class="content">
            <div class="report-title">
                <h1>Reporte mensual de <span>Eventos</span></h1>
                <p>{{ date('d/m/Y') }}</p>
            </div>

            <h2>Listado</h2>
            <table>
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Tipo de evento</th>
                        <th>descripcion</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->titulo_evento }}</td>
                        @foreach ($tipoeventos as $tipoevento)
                        @if ($tipoevento->id === $evento->id_tipoEvento)
                        <td>{{ $tipoevento->nombre_tipoEvento }}</td>
                        @endif
                        @endforeach
                        <td>{{ $evento->descripcion_evento }}</td>
                        <td>{{ $evento->fecha_inicio }}</td>
                        <td>{{ $evento->fecha_fin }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>