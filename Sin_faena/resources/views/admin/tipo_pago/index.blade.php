@extends('layouts.admin')
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Tipos de Pago</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">

      <a href="{{ route('admin.tipo_pago.show', $tipo_pago->id) }}" class="btn btn-primary">
        <i class="fas fa-solid fa-info-circle"></i>
      </a>

      <form method="GET" action="{{ route('admin.tipo_pago.create') }}">
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
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($tipo_pagos as $tipo_pago)

            <td>{{ $tipo_pago->id }}</td>
            <td>{{ $tipo_pago->nombre_tipoPago }}</td>
            <td>{{ $tipo_pago->descripcion_tipoPago }}</td>
            <td>

              <a href="{{ route('admin.tipo_pago.show', $tipo_pago->id) }}" class="btn btn-primary">
                <i class="fas fa-solid fa-info-circle"></i>
              </a>

              <form action="{{ route('admin.tipo_pago.destroy', $tipo_pago->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
              <th>Descripción</th>
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