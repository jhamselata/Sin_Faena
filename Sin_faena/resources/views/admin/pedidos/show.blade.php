@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-sm-6">
                <h1 class="mb-6 mx-2 mt-3">Datos del pedido</h1>
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

                            <div class="mb-3 text-dark">
                                <label for="id_usuario" class="form-label">Usuario</label>
                                @foreach ($users as $user)
                                            @if ($user->id === $pedido->id_usuario)
                                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                                            @endif
                                            @endforeach
                            </div>

                            <div class="mb-3 text-dark">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" readonly>{{ $pedido->descripcion_pedido }}</textarea>
                            </div>

                            <div class="mb-3 text-dark">
                                <label for="fecha_pedido" class="form-label">Fecha pedido</label>
                                <input type="text" class="form-control" value="{{ $pedido->fecha_pedido }}" readonly>
                            </div>

                            <div class="mb-3 text-dark">
                                <label for="servicios" class="form-label">Servicios</label>
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach ($pedido->servicios as $servicio)
                                        <tr>
                                            <td>{{ $servicio->nombre_servicio }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-3 text-dark">
                                <label for="estado_pedido" class="form-label">Estado</label>
                                <input type="text" class="form-control" value="{{ $pedido->estado_pedido }}" readonly>
                            </div>

                            <a href="{{ route('admin.pedidos.index') }}" class="btn btn-danger">Regresar</a>
                            <a href="{{ route('admin.pedidos.edit', $pedido->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('admin.pedidos.reporte', ['id' => $pedido->id]) }}" class="btn btn-warning" target="_blank">Reporte</a>

                        </div>
                    </div>
                </div>
                <!-- FIN - MODAL FORM -->
                <!-- FIN - CARD DE LA TABLA -->

            </div>

        </div>
    </div>

</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection