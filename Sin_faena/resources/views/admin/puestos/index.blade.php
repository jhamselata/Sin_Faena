@extends('layouts.admin')
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Puestos</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">

      <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>

      <form method="GET" action="{{ route('admin.puestos.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>

    </div>

    <!-- MODAL FORM -->

    <div class="container-fluid">
      @if (session('success'))
      <div id="successAlert" class="alert alert-success alert-bs-dismissible fade show" role="alert">
        {{ session('success') }}
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
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($puestos as $puesto)
            <tr>

              <td>{{ $puesto->nombre_puesto }}</td>
              <td>

                <a href="{{ route('admin.puestos.show', $puesto->id) }}" class="btn btn-primary">
                  <i class="fas fa-solid fa-info-circle"></i>
                </a>



                <form action="{{ route('admin.puestos.destroy', $puesto->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
              <th>Nombre</th>
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