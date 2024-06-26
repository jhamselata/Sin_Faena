@extends('layouts.admin')
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Bancos</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">

      <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>

      <form method="GET" action="{{ route('admin.bancos.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>

    <!-- MODAL FORM -->

    <div class="container-fluid">
      @if (session('success'))
      <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
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
              <th>ID</th>
              <th>Nombre</th>
              <th>RNC</th>
              <th>Teléfono</th>
              <th>Correo electrónico</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($bancos as $banco)
            <tr>
              <td>{{ $banco->id }}</td>
              <td>{{ $banco->nombre_banco }}</td>
              <td>{{ $banco->rnc }}</td>
              <td>{{ $banco->telefono_banco }}</td>
              <td>{{ $banco->correo }}</td>
              <td>

                <a href="{{ route('admin.bancos.show', $banco->id) }}" class="btn btn-primary">
                  <i class="fas fa-solid fa-info-circle"></i>
                </a>



                <form action="{{ route('admin.bancos.destroy', $banco->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
              <th>Nombre</th>
              <th>RNC</th>
              <th>Teléfono</th>
              <th>Correo electrónico</th>
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