@extends('layouts.admin')
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Informes</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
      <button type="button" class="btn btn-secondary">
        Inicio
      </button>
      <form method="GET" action="{{ route('admin.informes.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>

      <a href="{{ route('admin.informes.reporte') }}" class="btn btn-warning" target="_blank">Reporte</a>

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
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Tipo de informe</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Accciones</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($informes as $informe)
              <tr>


                <td>{{ $informe->fecha_informe }}</td>
                <td>{{ $informe->id_remitente }}</td>
                <td>{{ $informe->id_destinatario }}</td>
                <td>{{ $informe->id_tipoInforme }}</td>
                <td>{{ $informe->titulo_informe }}</td>
                <td>{{ $informe->descripcion_informe }}</td>
                <td>

                  <a href="{{ route('admin.informes.show', $informe->id) }}" class="btn btn-primary">
                    <i class="fas fa-solid fa-info-circle"></i>
                  </a>



                  <form action="{{ route('admin.informes.destroy', $informe->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
                  <th>Fecha</th>
                  <th>Remitente</th>
                  <th>Destinatario</th>
                  <th>Tipo de informe</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Accciones</th>
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