<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Conexión con pluggins-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">        

        <!--Favicon-->
        <!-- <link rel="shortcut icon" href="img/logo-icon.png" type="image/x-icon"> -->
        
        <!--Vinculación de archivos-->
        <link href="{{ asset('css/estilo.css')}}" rel="stylesheet" />
        
        <!--Nombre del sitio-->
        <title>SinFaena</title>
        
    </head>

    <body>

    @include('layouts.partials.header_client')

<!-- FIN - HEADER -->

<!-- BARRA LATERAL DE NAVEGACION -->

  


          <section class="nosotros">
              <div class="sn-text">
                  <h1>Sobre <span>Nosotros</span></h1>
                  <p>Enfocados en el bienestar y crecimiento de negocios, nos encargamos 
                    de acompañar a las empresas en la creación de su identidad y cercanía 
                    al público de su preferencia. Ofrecemos una gran variedad de servicios 
                    para abarcar cada detalle esencial de su publicidad, además, nos concentramos 
                    en dar soluciones y alternativas cercanas a las realidades de nuestros clientes 
                    yendo de la mano con sus ideas haciendo uso de las mejores herramientas de edición, 
                    organización, redacción, diseño y comunicación asertiva para estar en el punto medio 
                    de la innovación y la identidad que nuestros clientes desean transmitir.</p>
                  <a href="#" class="btn">¡Contáctanos ya!</a>
              </div>

              <div class="sn-img">
                <video src="{{ asset('assets/img/sobre-nos.mp4') }}" loop autoplay muted></video>
              </div>
              
          </section>


          <section class="mvv-cards">
            <div class="wrapper">

              <div class="mvv-title">
                <h1>Conóce<span>nos</span></h1>
                <h2>Misión - Visión - Valores</h2>
              </div>
              

                <div class="box-area">
                  
                    <div class="box">
                        <video src="{{ asset('assets/img/Lados.mp4') }}" loop autoplay muted></video>
                        <div class="overlay">
                          <h2>Misión</h2>
                          <p>Proporcionar un servicio de calidad y crear de la mano de nuestros clientes una imagen que transmita su esencia</p>
                        </div>
                    </div>

                    <div class="box">
                      <video src="{{ asset('assets/img/Medio.mp4') }}" loop autoplay muted></video>
                      <div class="overlay">
                        <h2>Visión</h2>
                        <p>Ser la empresa líder en el mercado actual y convertirnos en inspiración a la hora de crear y/o producir contenido</p>                      
                        </div>
                  </div>

                  <div class="box">
                    <video src="http://localhost:8000/assets/img/Lados.mp4" loop autoplay muted></video>
                    <div class="overlay">
                      <h2>Valores</h2>
                      <ul>
                        <li>Calidad</li>
                        <li>Ética</li>
                        <li>Respeto</li>
                        <li>Compromiso</li>
                        <li>Responsabilidad</li>
                        <li>Innovación</li>
                      </ul>                
                      </div>
                </div>

                </div>
            </div>

          </section>



          <section class="producto">

              <div class="producto-text">
                <h2>Nuestros</h2>
                <h1>Servicios</h1>
                <p>Para realizar un pedido relativo a nuestros servicios, complete
                  de forma correcta el siguiente formulario de solicitud y disfrute de 
                  cada detalle que tenemos para ti...</p>
                  <a href="{{ route('user.pedidos.create') }}" class="btn">Realizar pedido</a>
              </div>

              <div class="producto-container">
                <div class="card-content">

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/1.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Manejo de</span>
                      <h2 class="card-title">Redes sociales</h2>
                    </div>
                  </div>

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/2.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Toma y edición de</span>
                      <h2 class="card-title">Videos e imágenes</h2>
                    </div>
                  </div>

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/3.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Redacción de</span>
                      <h2 class="card-title">Documentos</h2>
                    </div>
                  </div>

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/4.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Croquis para</span>
                      <h2 class="card-title">Plataformas</h2>
                    </div>
                  </div>

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/5.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Creación de</span>
                      <h2 class="card-title">Páginas web y aplicaciones</h2>
                    </div>
                  </div>

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/6.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Creación de imagen</span>
                      <h2 class="card-title">Plan de negocios y diseño de marca</h2>
                    </div>
                  </div>

                  <div class="producto-card">
                    <img class="card-img" src="{{ asset('assets/img/7.png') }}" alt="">

                    <div class="producto-datos">
                      <span class="card-info">Presentaciones, flyers, portadas, tarjetas de presentación</span>
                      <h2 class="card-title">Diseños de todo tipo</h2>
                    </div>
                  </div>

                </div>

                <div class="btn-p" id="prevBtn"><i class='bx bx-chevron-left'></i></div>
                <div class="btn-p" id="nextBtn"><i class='bx bx-chevron-right'></i></div>

              </div>

          </section>


          <section class="marcas">

            <div class="marcas-title">
                <h2>Conoce nuestras</h2>
                <h1>Marcas aliadas</h1>
            </div>

            <section class="gallery">
                
              <video src="{{ asset('assets/img/serv1.mp4') }}" loop autoplay muted></video>
              <video src="{{ asset('assets/img/serv2.mp4') }}" loop autoplay muted></video>
              <video src="{{ asset('assets/img/serv3.mp4') }}" loop autoplay muted></video>
              <video src="{{ asset('assets/img/serv4.mp4') }}" loop autoplay muted></video>

            </section>

                <section class="Form-Contacto">

      <div class="container-form">

        <div class="contact-box">
          <div class="left">
            <img src="{{ asset('assets/img/contacto.png')}}" alt="">
          </div>

          <div class="right">

            <!-- Mensajes de error y éxito -->
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('send.email') }}" method="POST">
              @csrf
              <h2 class="contacto-title">Contáctanos ya</h2>

              <input type="text" class="field" name="name" placeholder="Nombre" required>
              <input type="email" class="field" name="email" placeholder="Correo electrónico" required>
              <input type="text" class="field" name="phone" placeholder="Teléfono" required>
              <input type="text" class="field" name="subject" placeholder="Asunto" required>
              <textarea name="message" placeholder="Mensaje" class="field" required></textarea>

              <button type="submit" class="btn">Enviar</button>
            </form>

          </div>

        </div>

      </div>

    </section>

            
          </section>

                @include('layouts.partials.footer_client')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script src="{{ asset('js/script.js') }}"></script>
                

    </body>
</html>