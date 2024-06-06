@extends($layout)
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Facturas</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">

      <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>

      <form method="GET" action="{{ route('admin.facturas.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>

    </div>

    <!-- MODAL FORM -->

    <div class="container-fluid">
      @if (session('success'))
      <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"></span>
      </div>
      @endif
    </div>

    <!-- FIN - MODAL FORM -->

    <!-- CARD DE LA TABLA -->
    <div class="card mb-4">

      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Datos
      </div>

      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Pedido</th>
              <th>Cliente</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($facturas as $factura)
            <tr>

              <td>{{ $factura->id }}</td>
              <td>{{ $factura->fecha_factura }}</td>
              <td>{{ $factura->id_pedido }}</td>
              @foreach ($pedidos as $pedido)
              @if ($pedido -> id === $factura -> id_pedido)
              @foreach ($users as $user)
              @if ($user -> id === $pedido -> id_usuario)
              @foreach ($clientes as $cliente)
              @if ($cliente -> id_usuario === $user -> id)
              <td>{{ $cliente -> nombre_Cli }}</td>
              @endif
              @endforeach
              @endif
              @endforeach
              @endif
              @endforeach

            <tr>

              <a href="{{ route('admin.facturas.show', $factura->id) }}" class="btn btn-primary">
                <i class="fas fa-solid fa-info-circle"></i>
              </a>

              @if(auth()->user()->hasRole('supervisor') || auth()->user()->hasRole('admin'))
              <form action="{{ route('admin.facturas.destroy', $pedido->id) }}" method="post" onsubmit="return confirm('Desea eliminar los datos de esta factura?')" style="display: inline-block;">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">
                  <i class="fas fa-solid fa-trash"></i>
                </button>
              </form>
              @endif

              <a href="{{ route('admin.facturas.reporte', ['factura' => $facturas->id]) }}" class="btn btn-warning" target="_blank">
                <i class="fas fa-solid fa-print"></i>
              </a>

            </tr>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Pedido</th>
              <th>Cliente</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>
    <!-- FIN - CARD DE LA TABLA -->

  </div>
</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->

@endsection
