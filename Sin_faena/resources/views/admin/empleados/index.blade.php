@if(Auth::check())
    @if(Auth::user()->hasRole('admin'))
        @extends('layouts.admin')
    @elseif(Auth::user()->hasRole('empleado'))
        @extends('layouts.empleado')
    @elseif(Auth::user()->hasRole('supervisor'))
        @extends('layouts.supervisor')
    @else
        <!-- Puedes manejar otros roles o casos especiales aquí -->
    @endif
@else
    <!-- Opcionalmente, manejar usuarios no autenticados -->
    <p>No tienes acceso.</p>
@endif
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Empleados</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">

      <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>

      <form method="GET" action="{{ route('admin.empleados.create') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>

      <a href="{{ route('admin.empleados.reporte') }}" class="btn btn-warning" target="_blank">Reporte</a>

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
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Cedula</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($empleados as $empleado)
            <tr>

              @foreach ($users as $user)
              @if ($user->id === $empleado->id_usuario)
              <td>{{ $user->name }}</td>
              @endif
              @endforeach

              <td>{{ $empleado->nombre_emp }}</td>
              <td>{{ $empleado->apellido_emp }}</td>
              <td>{{ $empleado->cedula }}</td>
              <td>

                <a href="{{ route('admin.empleados.show', $empleado->id) }}" class="btn btn-primary">
                  <i class="fas fa-solid fa-info-circle"></i>
                </a>



                <form action="{{ route('admin.empleados.destroy', $empleado->id) }}" method="post" onsubmit="return confirm('Desea eliminar el registro?')" style="display: inline-block;">
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
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Cedula</th>
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