@extends('layouts.admin')
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

  <div class="container-fluid px-4">
    <h1 class="mt-5">Usuarios</h1>
    <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
    <a href="{{ route('inicio')}}" class="btn btn-secondary">
        <i class="fas fa-solid fa-house"></i>
      </a>

      <a href="{{ route('admin.users.reporte') }}" class="btn btn-warning" target="_blank">Reporte</a>
    </div>

    <!-- MODAL FORM -->

    <div class="container-fluid">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"></span>
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
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Contraseña</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($users as $user)
              <tr>

                @foreach ($users as $user)
                @if ($user->id === $user->id_usuario)
                <td>{{ $user->name }}</td>
                @endif
                @endforeach

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>

              </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Contraseña</th>
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