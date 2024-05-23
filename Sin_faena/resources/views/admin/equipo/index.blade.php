@extends('layouts.admin')
@section('content')

<!-- Contenido de los formularios y su contenido en tablas -->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Equipo</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
      <button type="button" class="btn btn-secondary">
        Inicio
      </button>
      <form method="GET" action="{{ route('admin.equipos.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>

      <button type="button" class="btn btn-warning">
        Reporte
      </button>
    </div>


    <!-- MODAL FORM -->

    <div class="container-fluid">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
      @endif

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
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($equipos as $equipo)
              <tr>

                @foreach ($tipoequipos as $tipoequipo)
                @if ($tipoequipo->id === $equipo->id_tipoEquipo)
                <td>{{ $tipoequipo->nombre_tipoEquipo }}</td>
                @endif
                @endforeach

                <td>{{ $equipo->id }}</td>
                <td>{{ $equipo->id_tipoEquipo }}</td>
                <td>{{ $equipo->nombre_equipo }}</td>

                <td>

                  <a href="{{ route('admin.equipos.show', $equipo->id) }}" class="btn btn-primary">
                    <i class="fas fa-solid fa-info-circle"></i>
                  </a>



                  <form action="{{ route('admin.equipos.destroy', $equipo->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">
                      <i class="fas fa-solid fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
      <!-- Fin de la targeta de la tabla -->

    </div>
</main>
<!-- Fin del contenido de los formularios y las tablas-->

@endsection