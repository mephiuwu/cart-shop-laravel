<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="GameShop es una tienda de vídeojuegos, consolas, etc.">
    <meta name="keywords" content="games, juegos, store, tienda, storegame, consoles, consolas">
    <meta name="author" content="Mephi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GameShop - Registrar</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Start CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
        .alertRepass{
            font-weight: 700;
            color: #ff3f3f;
            font-size: 80%;
        }
    </style>
    <!-- End CSS -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box register-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-10 col-lg-8">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}" id="registrar">
                                        @csrf
                                        <div class="form-head">
                                            <a href="{{url('/')}}" class="logo"><img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt="logo"></a>
                                        </div>

                                        <h4 class="text-primary my-3">Regístrate</h4>
                                        <p>Ingresa tus datos personales y disfruta de una experiencia de compra más rápida.</p>

                                        <div class="form-group">
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre" autocomplete="off" required>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control @error('surnames') is-invalid @enderror" id="surnames" name="surnames" placeholder="Apellidos" autocomplete="off" required>
                                                    @error('surnames')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control @error('rut') is-invalid @enderror" id="rut" name="rut" placeholder="RUT" autocomplete="off" required>
                                                    @error('rut')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1" style="height: 36.5px">+569</span>
                                                        </div>
                                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Número" autocomplete="off" required>
                                                    </div>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repita su contraseña" required>
                                            <span id="alertRepassword" role="alert">
                                            </span>
                                        </div>
                                        {{-- <div class="form-row mb-3">
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox text-left">
                                                    <input type="checkbox" class="custom-control-input" id="terms">
                                                    <label class="custom-control-label font-14" for="terms">I Agree to Terms & Conditions of Orbiter</label>
                                                </div>                                
                                            </div>
                                        </div>  --}}                         
                                      <button class="btn btn-success btn-lg btn-block font-18" onclick="validatePassword(true)">Registrarse</button>
                                    </form>
                                    <p class="mb-0 mt-3">¿Ya tienes una cuenta? <a href="{{url('/login')}}">Ingresar</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start JS -->        
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script>


        $('#password_confirmation').blur(function (e) { 
            e.preventDefault();
            validatePassword(false);
        });

        function validatePassword($submit){
            let repassword = $('#password_confirmation').val();
            let password = $('#password').val();

            if (repassword != password) {
                $('#alertRepassword').html(`
                    <strong class="alertRepass">Las contraseñas no coinciden.</strong>
                `);
                $('#password_confirmation').addClass('is-invalid');
            }

            if($submit){
                $('#registrar').submit();
            }
        }
    </script>
    <!-- End js -->
</body>
</html>