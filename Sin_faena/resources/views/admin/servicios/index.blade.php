@extends($layout)
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Servicios</h1>
    
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
      <button type="button" class="btn btn-secondary">
        Inicio
      </button>
      @if(auth()->user()->hasRole('admin'))
            <form method="GET" action="{{ route('admin.servicios.create') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        @endif

      <a href="{{ route('admin.servicios.reporte') }}" class="btn btn-warning" target="_blank">Reporte</a>

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
              <th>Tipo de servicio</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Duracion</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($servicios as $servicio)
            <tr>

              <td>{{ $servicio->id_tipoServicio }}</td>
              <td>{{ $servicio->nombre_servicio }}</td>
              <td>{{ $servicio->descripcion_servicio }}</td>
              <td>{{ $servicio->precio_servicio }}</td>
              <td>{{ $servicio->duracion_estimada }}</td>
              <td>

                <a href="{{ route('admin.servicios.show', $servicio->id) }}" class="btn btn-primary">
                  <i class="fas fa-solid fa-info-circle"></i>
                </a>


                @if(auth()->user()->hasRole('admin'))
                <form action="{{ route('admin.servicios.destroy', $servicio->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
              <th>Tipo de servicio</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Duracion</th>
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