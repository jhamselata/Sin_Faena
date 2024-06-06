    <head>
  
        <link rel="stylesheet" href="{{ asset('./css/form.css') }}" />
        <title>Registro | Sin Faena</title>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    </head>
    

    <div class="container">
  
        <div class="forms-container">
  
            <div class="signin-signup">

                <form class="sing-up-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <h2 class="title">Informe</h2>

                    <!-- Name -->
                    <div class="input-field">
                        <i class="bx bx-mail"></i>
                        <input placeholder="Título" id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="input-field">
                        <i class="bx bx-mail"></i>
                        <input placeholder="Correo electrónico" id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="error-message" />
                      </div>

                    <!-- Password -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input placeholder="Contraseña" id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="error-message" />
                        
                      </div>

                    <!-- Confirm Password -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input placeholder="Confirmar contraseña" id="password_confirmation" class="form-control"
                        type="password"
                        name="password_confirmation"
                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="error-message" />
                        
                      </div>

                

                        <x-primary-button class="btn solid">
                            {{ __('Registrar') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
    
        </div>

        <div class="panels-container">
    
            <div class="panel left-panel">
          
                <div class="content">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <a class="link" id="sign-up-btn" href="{{ route('login') }}"> Inicia sesión </a>
                </div>

            </div>

        </div>

    </div>

