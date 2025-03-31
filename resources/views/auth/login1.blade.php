<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Emunah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Notika CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wave/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notika-custom-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <div class="login-content">
        <div class="nk-block toggled" id="l-login">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="nk-form">

                    <!-- Mensaje de sesión -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Errores -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Email -->
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                        <div class="nk-int-st">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus class="form-control" placeholder="Correo electrónico">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input id="password" type="password" name="password" required class="form-control"
                                placeholder="Contraseña">
                        </div>
                    </div>

                    <!-- Recordarme -->
                    <div class="fm-checkbox mt-2">
                        <label>
                            <input type="checkbox" name="remember" class="i-checks"
                                {{ old('remember') ? 'checked' : '' }}> <i></i> Recuérdame
                        </label>
                    </div>

                    <!-- Botón -->
                    <button type="submit" class="btn btn-login btn-success btn-float">
                        <i class="notika-icon notika-right-arrow right-arrow-ant"></i>
                    </button>
                </div>
            </form>

            <!-- Links adicionales -->
            <div class="nk-navigation nk-lg-ic mt-3">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="notika-icon notika-plus-symbol"></i>
                        <span>Registrarse</span></a>
                @endif
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><i>?</i> <span>¿Olvidaste tu clave?</span></a>
                @endif
            </div>
        </div>
    </div>

    <!-- Notika JS -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery-price-slider.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/meanmenu/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/sparkline/sparkline-active.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/flot/flot-active.js') }}"></script>
    <script src="{{ asset('js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/knob/knob-active.js') }}"></script>
    <script src="{{ asset('js/chat/jquery.chat.js') }}"></script>
    <script src="{{ asset('js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('js/wave/wave-active.js') }}"></script>
    <script src="{{ asset('js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/icheck/icheck-active.js') }}"></script>
    <script src="{{ asset('js/todo/jquery.todo.js') }}"></script>
    <script src="{{ asset('js/login/login-action.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
