@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Facturación</h1>
            </div>
        </div>
    </div>
</div>
<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

    <!-- MODAL FORM -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="{{ route('admin.facturas.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id" class="form-label">Número de factura: </label>
                                            <input name="id" class="form-control" value="{{old('id', '')}}" autofocus readonly>
                                            @if ($errors->has('id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="fecha_factura" class="form-label">Fecha: </label>
                                            <input type="date" name="fecha_factura" class="form-control" value="{{old('fecha_factura', '')}}" autofocus readonly>
                                            @if ($errors->has('fecha_factura'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('fecha_factura') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_pedido" class="form-label">Número de pedido: </label>
                                            <select class="form-control select2" name="id_pedido" id="id_pedido" style="width: 100%;" autofocus onchange="updateFields()">
                                                <option value="">Seleccione su pedido</option>
                                                @foreach ($pedidos as $pedido)
                                                <option value="{{ $pedido->id }}" data-user="{{ $pedido->user->id }}" data-cliente="{{ $pedido->cliente->nombre }}" data-telefono="{{ $pedido->cliente->telefono }}" data-rnc="{{ $pedido->cliente->rnc }}" data-servicios='@json($pedido->servicios)'>
                                                    {{ $pedido->id }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_pedido'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_pedido') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Cargar los datos del cliente -->

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="id_usuario" class="form-label">Usuario: </label>
                                            <input name="id_usuario" class="form-control" value="{{old('id_usuario', '')}}" autofocus readonly>
                                            @if ($errors->has('id_usuario'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_usuario') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="nombre_cli" class="form-label">Nombre: </label>
                                            <input name="nombre_cli" class="form-control" value="{{old('nombre_cli', '')}}" autofocus readonly>
                                            @if ($errors->has('nombre_cli'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('nombre_cli') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="telefono_cli" class="form-label">Teléfono: </label>
                                            <input name="telefono_cli" class="form-control" value="{{old('telefono_cli', '')}}" autofocus readonly>
                                            @if ($errors->has('telefono_cli'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('telefono_cli') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="rnc_cli" class="form-label">RNC: </label>
                                            <input name="rnc_cli" class="form-control" value="{{old('rnc_cli', '')}}" autofocus readonly>
                                            @if ($errors->has('rnc_cli'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('rnc_cli') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Datos que van para el detalle de factura -->

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="servicios_list" class="form-label">Descripción </label>
                                            <ul id="servicios_list"></ul>
                                            @if ($errors->has('id_servicio'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('id_servicio') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="cantidad" class="form-label">Cantidad </label>
                                            <input name="cantidad" class="form-control" value="{{old('cantidad', '')}}" autofocus>
                                            @if ($errors->has('cantidad'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('cantidad') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="precio_unitario" class="form-label">Precio unitario </label>
                                            <input name="precio_unitario" class="form-control" value="{{old('precio_unitario', '')}}" autofocus readonly>
                                            @if ($errors->has('precio_unitario'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('precio_unitario') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="importe" class="form-label">Importe </label>
                                            <input name="importe" class="form-control" value="{{old('importe', '')}}" autofocus readonly>
                                            @if ($errors->has('importe'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('importe') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Fin de los datos que van para el detalle de factura -->

                                <!-- Datos correspondientes a los montos a pagar -->

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="subtotal" class="form-label">Subtotal: </label>
                                            <input name="subtotal" class="form-control" value="{{old('subtotal', '')}}" autofocus readonly>
                                            @if ($errors->has('subtotal'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('subtotal') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="total_itbis" class="form-label">Itbis 18%: </label>
                                            <input name="total_itbis" class="form-control" value="{{old('total_itbis', '')}}" autofocus readonly>
                                            @if ($errors->has('total_itbis'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('total_itbis') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="mb-3 text-dark">
                                            <label for="total_pagar" class="form-label">Total: </label>
                                            <input name="total_pagar" class="form-control" value="{{old('total_pagar', '')}}" autofocus readonly>
                                            @if ($errors->has('total_pagar'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('total_pagar') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            <!-- Fin de los datos correspondientes al pago a realizar -->

                            <button class="btn btn-primary" type="submit">Generar</button>

                            @foreach ($facturas as $factura)
                            <a href="{{ route('admin.facturas.reporte', ['factura' => $factura->id]) }}" class="btn btn-warning" target="_blank">
                                <i class="fas fa-solid fa-print"></i>
                            </a>
                            @endforeach

                            <a href="{{ route('admin.facturas.index') }}" onclick="confirmarRegreso(event)">
                                <i class="btn btn-danger">Regresar</i>
                            </a>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- FIN - MODAL FORM -->
                <!-- FIN - CARD DE LA TABLA -->

            </div>
        </div>
    </div>

    <script>
    function updateFields() {
        var pedidoSelect = document.getElementById('id_pedido');
        var selectedOption = pedidoSelect.options[pedidoSelect.selectedIndex];
        
        var userId = selectedOption.getAttribute('data-user');
        var clienteNombre = selectedOption.getAttribute('data-cliente');
        var clienteTelefono = selectedOption.getAttribute('data-telefono');
        var clienteRnc = selectedOption.getAttribute('data-rnc');
        var servicios = JSON.parse(selectedOption.getAttribute('data-servicios'));
        
        document.getElementsByName('id_usuario')[0].value = userId;
        document.getElementsByName('nombre_cli')[0].value = clienteNombre;
        document.getElementsByName('telefono_cli')[0].value = clienteTelefono;
        document.getElementsByName('rnc_cli')[0].value = clienteRnc;

        var serviciosList = document.getElementById('servicios_list');
        serviciosList.innerHTML = '';
        var totalPrecio = 0;

        servicios.forEach(function(servicio) {
            var li = document.createElement('li');
            li.textContent = servicio.nombre_servicio + ' - Precio: ' + servicio.precio;
            serviciosList.appendChild(li);
            totalPrecio += parseFloat(servicio.precio);
        });

        document.getElementsByName('precio_unitario')[0].value = totalPrecio / servicios.length;
        document.getElementsByName('subtotal')[0].value = totalPrecio;
        var totalItbis = totalPrecio * 0.18;
        document.getElementsByName('total_itbis')[0].value = totalItbis;
        document.getElementsByName('total_pagar')[0].value = totalPrecio + totalItbis;
    }
</script>


    <script>
        function confirmarRegreso(event) {
            let confirmar = window.confirm("¿Estás seguro de que deseas regresar? Se perderán los datos no guardados.");
            if (confirmar) {
                window.location.href = "{{ route('admin.facturas.index') }}";
            } else {
                event.preventDefault();
            }
        }
    </script>


</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection