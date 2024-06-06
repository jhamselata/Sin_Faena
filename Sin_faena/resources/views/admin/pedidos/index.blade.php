@extends($layout)
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Pedidos</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">

      <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>

      <form method="GET" action="{{ route('admin.pedidos.create') }}">
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
              <th>Usuario</th>
              <th>Fecha de entrega</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($pedidos as $pedido)
            <tr>

              @foreach ($users as $user)
              @if ($user->id === $pedido->id_usuario)
              <td>{{ $user->name }}</td>
              @endif
              @endforeach

              <td>{{ $pedido->fecha_pedido }}</td>
              <td>{{ $pedido->estado_pedido }}</td>
              <td>

                <a href="{{ route('admin.pedidos.show', $pedido->id) }}" class="btn btn-primary">
                  <i class="fas fa-solid fa-info-circle"></i>
                </a>


                @if(auth()->user()->hasRole('supervisor') || auth()->user()->hasRole('admin'))
                <form action="{{ route('admin.pedidos.destroy', $pedido->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">
                    <i class="fas fa-solid fa-trash"></i>
                  </button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Acciones</th>
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