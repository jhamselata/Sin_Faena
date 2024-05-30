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
            <button type="button" class="btn btn-warning">
                Reporte
            </button>
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

        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Evento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                    </div>
                    <div class="modal-body">
                        <form id="formulario" action="{{ route('admin.eventos.store') }}" method="POST">
                            @csrf

                            <div class="form-group d-none">
                                <label for="id" class="required">Id</label>
                                <input type="text" class="form-control mb-3" name="id" id="id" aria-describedby="helpId" placeholder="Ingrese el id del evento" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title" class="required">Titulo</label>
                                <input type="text" class="form-control mb-3" name="titulo_evento" id="titulo_evento" aria-describedby="helpId" placeholder="Ingrese el titulo del evento">
                            </div>

                            <div class="form-group">
                                <label for="id_tipoEvento">Tipo evento</label>
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
                                <label for="description">Anexo</label>
                                <input type="file" name="anexos" id="anexos" class="form-control mb-3">
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="descripcion_evento" id="descripcion_evento" class="form-control mb-3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="start">Fecha inicio</label>
                                <input type="date" class="form-control date  mb-3" name="fecha_inicio" id="fecha_inicio" aria-describedby="helpId" placeholder="Ingresa una fecha de inicio">
                            </div>

                            <div class="form-group">
                                <label for="end">Fecha final</label>
                                <input type="date" class="form-control date mb-3" name="fecha_fin" id="fecha_fin" aria-describedby="helpId" placeholder="Ingresa una fecha final">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="btnGuardar"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                        <button type="button" class="btn btn-warning" id="btnEditar"><i class="fas fa-pen"></i> Editar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar"><i class="fas fa-trash"></i> Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-fw fa-lg fa-arrow-left"></i> Regresar</button>
                    </div>
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
            var baseURL = '{{ url(' / ') }}';
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

                        // Mostrar el modal
                        $('#evento').modal("show");
                    },
                    eventClick: function(info) {
                        axios.post(baseURL + "/events/editar/" + info.event.id).then(
                            (respuesta) => {
                                formulario.id.value = respuesta.data.id;
                                formulario.titulo_evento.value = respuesta.data.titulo_evento;
                                formulario.id_tipoEvento.value = respuesta.data.id_tipoEvento;
                                formulario.anexos.value = respuesta.data.anexos;
                                formulario.descripcion_evento.value = respuesta.data.descripcion_evento;
                                formulario.fecha_inicio.value = respuesta.data.fecha_inico;
                                formulario.fecha_fin.value = respuesta.data.fecha_fin;

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

                    enviarDatos("/events/crear/");

                });

                document.getElementById("btnEliminar").addEventListener("click", function(event) {

                    enviarDatos("/events/borrar/" + formulario.id.value);
                });

                document.getElementById("btnEditar").addEventListener("click", function(event) {
                    enviarDatos("/events/actualizar/" + formulario.id.value);
                });

                function enviarDatos(url) {
                    event.preventDefault();
                    const datos = new FormData(formulario);

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