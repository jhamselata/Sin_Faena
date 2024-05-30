@extends('layouts.admin')
@section('content')

<!--CONTENIDO DE LAS TABLAS Y FORMULARIOS-->
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-5">Eventos</h1>
        <div class="mb-4 mt-4 d-grid gap-2 d-md-flex">
            <button type="button" class="btn btn-secondary">
                Inicio
            </button>
            <a href="{{ route('admin.eventos.reporte') }}" class="btn btn-warning" target="_blank">Reporte</a>
        </div>


        <!-- MODAL FORM -->

        <div class="card">
            <div class="card-body">
                <div id='agenda'></div>
            </div>
        </div>

        <button type="button" class="btn btn-primary btn-lg d-none" data-toggle="modal" data-target="#evento">
            Launch
        </button>

        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" data-bs-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Evento</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                    </div>
                    <div class="modal-body">
                        <form id="formulario" action="{{ route('admin.eventos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group d-none">
                                <label for="id" class="required">Id</label>
                                <input type="text" class="form-control mb-3" name="id" id="id" aria-describedby="helpId" placeholder="Ingrese el id del evento">
                            </div>

                            <div class="form-group">
                                <label for="titulo_evento" class="required">Título</label>
                                <input type="text" class="form-control mb-3" name="titulo_evento" id="titulo_evento" aria-describedby="helpId" placeholder="Ingrese el título del evento" value="{{ old('titulo_evento') }}">
                                @if ($errors->has('titulo_evento'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('titulo_evento') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="id_tipoEvento">Tipo de Evento</label>
                                <select class="form-control select2 mb-3" name="id_tipoEvento" id="id_tipoEvento" style="width: 100%;" autofocus>
                                    <option value="">Seleccione un tipo de evento</option>
                                    @foreach ($tipo_eventos as $tipo_evento)
                                    <option value="{{ $tipo_evento->id }}" {{ old('id_tipoEvento') == $tipo_evento->id ? 'selected' : '' }}>
                                        {{ $tipo_evento->nombre_tipoEvento }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_tipoEvento'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('id_tipoEvento') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="anexos">Anexo</label>
                                <input type="file" name="anexos" id="anexos" class="form-control">
                                <a id="file-link" href="#" target="_blank" style="display:none;" class="mb-3">Ver archivo adjunto</a>
                                @if ($errors->has('anexos'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('anexos') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="descripcion_evento">Descripción</label>
                                <textarea name="descripcion_evento" id="descripcion_evento" class="form-control mb-3">{{ old('descripcion_evento') }}</textarea>
                                @if ($errors->has('descripcion_evento'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('descripcion_evento') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" class="form-control date mb-3" name="fecha_inicio" id="fecha_inicio" aria-describedby="helpId" placeholder="Ingresa una fecha de inicio" value="{{ old('fecha_inicio') }}">
                                @if ($errors->has('fecha_inicio'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fecha_fin">Fecha Final</label>
                                <input type="date" class="form-control date mb-3" name="fecha_fin" id="fecha_fin" aria-describedby="helpId" placeholder="Ingresa una fecha final" value="{{ old('fecha_fin') }}">
                                @if ($errors->has('fecha_fin'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('fecha_fin') }}</strong>
                                </span>
                                @endif
                            </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="btnGuardar"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                        <button type="button" class="btn btn-warning" id="btnEditar"><i class="fas fa-pen"></i> Editar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar"><i class="fas fa-trash"></i> Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-fw fa-lg fa-arrow-left"></i> Regresar</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

        @endsection

        @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            const baseURL = "http://127.0.0.1:8000"; // Asegúrate de que no haya espacios adicionales
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let formulario = document.querySelector("#formulario");
                var calendarEl = document.getElementById('agenda');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'UTC',
                    locale: 'es',
                    displayEventTime: false,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    buttonText: {
                        today: 'hoy',
                        month: 'mes',
                        week: 'semana',
                        day: 'día',
                    },
                    editable: true,
                    dayMaxEvents: true,
                    events: "{{ route('admin.eventos.all') }}",

                    dateClick: function(info) {
                        formulario.reset();
                        formulario.fecha_inicio.value = info.dateStr;
                        formulario.fecha_fin.value = info.dateStr;

                        document.getElementById('file-link').style.display = 'none';

                        // Mostrar el modal
                        $('#evento').modal("show");
                    },
                    eventClick: function(info) {
                        axios.get(baseURL + "/eventos/" + info.event.id).then(
                            (respuesta) => {
                                formulario.id.value = respuesta.data.id;
                                formulario.titulo_evento.value = respuesta.data.titulo_evento;
                                formulario.id_tipoEvento.value = respuesta.data.id_tipoEvento;
                                // No se puede establecer el valor de input type="file" programáticamente por razones de seguridad.

                                formulario.descripcion_evento.value = respuesta.data.descripcion_evento;
                                formulario.fecha_inicio.value = new Date(respuesta.data.fecha_inicio).toISOString().split('T')[0];
                                formulario.fecha_fin.value = new Date(respuesta.data.fecha_fin).toISOString().split('T')[0];

                                if (respuesta.data.anexos) {
                                    const fileLink = document.getElementById('file-link');
                                    fileLink.href = baseURL + "/storage/" + respuesta.data.anexos;
                                    fileLink.textContent = "Ver archivo adjunto";
                                    fileLink.style.display = 'block';
                                } else {
                                    document.getElementById('file-link').style.display = 'none';
                                }

                                $("#evento").modal("show");
                            }
                        ).catch(
                            error => {
                                if (error.response) {
                                    console.log(error.response.data);
                                }
                            }
                        )
                    }
                });


                calendar.render();

                document.getElementById("btnGuardar").addEventListener("click", function(event) {
                    enviarDatos("/eventos");
                });

                document.getElementById("btnEliminar").addEventListener("click", function(event) {
                    event.preventDefault();
                    axios.delete(baseURL + "/eventos/" + formulario.id.value).then(
                        (respuesta) => {
                            calendar.refetchEvents();
                            $("#evento").modal("hide");
                        }
                    ).catch(
                        error => {
                            if (error.response) {
                                console.log(error.response.data);
                            }
                        }
                    );
                });

                document.getElementById("btnEditar").addEventListener("click", function(event) {
                    enviarDatos("/eventos/update/" + formulario.id.value, 'put');
                });

                function enviarDatos(url, method = 'post') {
                    event.preventDefault();
                    const datos = new FormData(formulario);
                    datos.append('_method', method); // Agrega el método PUT

                    const nuevaURL = baseURL + url;

                    axios.post(nuevaURL, datos).then(
                        (respuesta) => {
                            calendar.refetchEvents();
                            $("#evento").modal("hide");
                        }
                    ).catch(
                        error => {
                            if (error.response) {
                                console.log(error.response.data);
                            }
                        }
                    )
                }


            });
        </script>


        @endpush