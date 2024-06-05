@extends($layout)
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Tareas</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
      <button type="button" class="btn btn-secondary">
        Inicio
      </button>
      @if(auth()->user()->hasRole('supervisor') || auth()->user()->hasRole('admin'))
      <form method="GET" action="{{ route('admin.tareas.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
      @endif

      <button type="button" class="btn btn-warning">
        Reporte
      </button>
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
                <th>id_empleado</th>
                <th>Inicio / Entrega</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($tareas as $tarea)
              <tr>

              @foreach ($users as $user)
                                            @if ($user->id === $tarea->id_usuario)
                <td>{{ $user->name }}</td>
                @endif
                                            @endforeach

                <td>{{$tarea->comenzar_tarea}}<span> / </span>{{$tarea->terminar_tarea}}</td>
                <td class="status-cell" data-status="{{ $tarea->estado_tarea }}">{{ $tarea->estado_tarea }}</td>
                <td>{{$tarea->prioridad_tarea}}</td>
                <td>

                  <a href="{{ route('admin.tareas.show', $tarea->id) }}" class="btn btn-primary">
                    <i class="fas fa-solid fa-info-circle"></i>
                  </a>


                  @if(auth()->user()->hasRole('supervisor') || auth()->user()->hasRole('admin'))
                  <form action="{{ route('admin.tareas.destroy', $tarea->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
                <th>ID</th>
                <th>Inicio / Entrega</th>
                <th>Estado</th>
                <th>Prioridad</th>
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