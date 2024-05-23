
    <head>
  
      <link rel="stylesheet" href="{{ asset('./css/form.css') }}" />
      <title>Inicio | Sin Faena</title>
      <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
    </head>
    <body>
  
      <div class="container">
  
        <div class="forms-container">
  
          <div class="signin-signup">
  
            <form method="POST" class="sign-in-form" action="{{ route('login') }}">
              @csrf
  
                  <h2 class="title">Inicio Sesión</h2>
  
                    <div class="input-field">
                      <i class="bx bx-mail"></i>
                      <input placeholder="Correo electrónico" id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                      <x-input-error :messages="$errors->get('email')" class="error-message" />
                    </div>
  
                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input placeholder="Contraseña" id="password" class="form-control"
                      type="password"
                      name="password"
                      required autocomplete="current-password" />
                      <x-input-error :messages="$errors->get('password')" class="error-message" />
                      
                    </div>
  
                    <div class="form-group">
                      <label for="remember_me" class="checkbox-label">
                          <input id="remember_me" type="checkbox" class="checkbox-input" name="remember">
                          <span class="remember-text">{{ __('Recuerdame') }}</span>
                      </label>
                  </div>
          
                  <div class="form-group">
                      @if (Route::has('password.request'))
                          <a class="forgot-password-link" href="{{ route('password.request') }}">
                              {{ __('¿Olvidaste tu contraseña?') }}
                          </a><br>
                      @endif
          
                      <x-primary-button class="btn solid">
                          {{ __('Iniciar sesión') }}
                      </x-primary-button>
  
            </form>
  
          </div>
  
        </div>
  
        <div class="panels-container">
  
          <div class="panel left-panel">
  
            <div class="content">
              <h3>¿Aún no tienes una cuenta?</h3>
                <a id="sign-up-btn" href="{{ route('register') }}"> Registrate </a>
            </div>
  
          </div>
  
        </div>
        
      </div>
  
      <script src="app.js"></script>
  
    
  