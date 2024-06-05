@extends('layouts.admin')
@section('content')

<!-- Contenidos de los formularios y las tablas -->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Tipos de cliente</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
      <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>
      <form method="GET" action="{{ route('admin.tipoclientes.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>

    <!-- Formulario de la pantalla modal -->

    <div class="container-fluid">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"></span>
      </div>
      @endif

      <!-- Fin de la pantalla modal -->


      <!-- Targeta de la tabla -->
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
              @foreach ($tipoclientes as $tipocliente)
              <tr>

                <td>{{ $tipocliente->nombre_tipoCli }}</td>
                <td>

                  <a href="{{ route('admin.tipoclientes.show', $tipocliente->id) }}" class="btn btn-primary">
                    <i class="fas fa-solid fa-info-circle"></i>
                  </a>

                  <form action="{{ route('admin.tipoclientes.destroy', $tipocliente->id) }}" method="post" onsubmit="return confirm('¿Desea eliminar el registro?')" style="display: inline-block;">
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
      <!-- Fin de la targeta de la tabla -->

    </div>
</main>
<!-- Fin del contenido de los formularios y las tablas -->

@endsection