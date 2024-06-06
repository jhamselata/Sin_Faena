<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .invoice-box {
            border: 1px solid #ddd;
            padding: 30px;
            margin: 20px auto;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .invoice-box .table td,
        .invoice-box .table th {
            padding: 12px;
        }

        .invoice-box .table th {
            background: #f5f5f5;
            font-weight: bold;
        }

        .invoice-box .table tfoot td {
            font-weight: bold;
        }

        .invoice-title {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-box">

            <div class="row">
                <div class="col-md-6">
                    <h2 class="invoice-title">Sin Faena</h2>
                </div>

                <div class="col-md-6 text-right">
                    <p>Número de factura: </p>
                    <p>Fecha: </p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h3>Datos de la empresa</h3>
                    <p><strong>Dirección:</strong> Santiago de los Caballeros</p>
                    <p><strong>Teléfono:</strong> (849) 398-4871</p>
                    <p><strong>Correo electrónico:</strong> sinfaena@gmail.com</p>
                </div>

                <div class="col-md-6 text-right">
                    <h3>Datos del cliente</h3>
                    <p><strong>Nombre:</strong> </p>
                    <p>Teléfono: </p>
                    <p>RNC: </p>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Importe </th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                    @if ($factura -> id === $detalle_factura -> id_factura)
                    @foreach ($detalle_facturas as $detalle_factura)
                    @if ($detalle_factura -> id_servicio === $servicio -> id_servicio)
                    @foreach ($servicios as $servicio)
                        <td>{{ $detalle_factura->nombre_servicio}}</td>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        <td>{{ $detalle_factura->cantidad}}</td>
                        <td>{{ $detalle_factura->precio_servicio}}</td>
                        <td>{{ $detalle_factura->importe}}</td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <td class="text-right">Subtotal: </td>
                        <td class="text-right">Itbis 18%: </td>
                        <td class="text-right">Total:</td>
                    </tr>
                </tfoot>

            </table>

            <div class="footer">
                <p>&copy; {{ date('Y') }} Sin Faena. Todos los derechos reservados.</p>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.js"></script>