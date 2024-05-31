<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Conexión con pluggins-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo-icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Favicon-->
    <!-- <link rel="shortcut icon" href="img/logo-icon.png" type="image/x-icon"> -->

    <!--Vinculación de archivos-->
    <link href="{{ asset('css/estilo.css')}}" rel="stylesheet" />

    <!--Nombre del sitio-->
    <title>SinFaena</title>
</head>

<body>

    @include('layouts.partials.header_client2')

    <!-- FIN - HEADER -->

    <!-- BARRA LATERAL DE NAVEGACION -->
    <section>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-md-8 mt-5 mb-5">
                    <div class="card text-center mt-5">
                        <div class="card-header bg-success text-white">
                            <h3>¡Pedido Enviado Exitosamente!</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Gracias por tu pedido</h5>
                            <p class="card-text">En 24 horas se le enviará una respuesta. Por favor, esté atento a su correo electrónico.</p>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="/" class="btn btn-primary">Volver al inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </section>

    @include('layouts.partials.footer_client')

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>