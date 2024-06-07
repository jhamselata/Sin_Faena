@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-9">
        </div>
    </div>
</div>
<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

    <!-- MODAL FORM -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('send.final.email') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h2 class="contacto-title mb-4">Enviar correo de <strong>confirmación</strong> al cliente</h2>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    @foreach ($users as $user)
                                    @if ($user->id === $pedido->id_usuario)
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required readonly disabled>
                                    @endif
                                    @endforeach
                                </div>

                                <div class="mb-3">
                                    <label for="link" class="form-label">Mensaje de confirmación:</label>
                                    <input type="text" class="form-control" id="link" name="link" value="Su pedido ha sido registrado exitosamente. Estaremos trabajando en ello..." required>
                                </div>

                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- FIN - MODAL FORM -->
                <!-- FIN - CARD DE LA TABLA -->

            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
</main>
<!-- FIN - CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
@endsection