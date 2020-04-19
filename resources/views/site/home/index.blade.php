<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/img/favicon.png') }}"/>

        <title>K & K - Bank</title>

        <!-- Favicon-->
        {{-- <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" /> --}}
        <!-- Font Awesome icons (free version)-->
        <script src="https://kit.fontawesome.com/a8b078765b.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ url(mix('site/css/styles.css')) }}">


    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 p-3 bg-info" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-white js-scroll-trigger" href="{{ route('balance') }}">
                    K & K <img class="portfolio-box-caption" src="{{ url('/img/logo.png') }}" style="max-width: 50px;">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link text-white js-scroll-trigger" href="{{ route('home') }}">
                                <i class="fas fa-university"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white js-scroll-trigger" href="{{ route('profile') }}">
                                <i class="fas fa-user"> </i> Meu perfil
                            </a>
                        </li>
                        @else
                        @if (Route::has('register'))
                        <a class="nav-link text-white js-scroll-trigger" href="{{ route('login') }}">
                            <i class="fas fa-user"></i> Logar
                        </a>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Rapidez, eficiência, qualidade e liquidez...</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Entre para o K&K e descubra um mundo novo de soluções financeiras!</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('register') }}">Quero ser Klient</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">Sobre o criador da plataforma</h2>
                <div class="container d-flex justify-content-center my-2">
                </div>
                <div class="container d-flex justify-content-center">
                    <img class="rounded" src="{{ url('/img/perfil.png') }}" alt="Lsantos" style="max-width: 100px;">
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Inspirações</h3>
                            <p class="text-muted mb-0 text-justify">
                                Este projeto é uma parceria de EspecializaTI, utilizando métodos
                                semelhantes aos utilizados em plataformas como PagSeguro, Nubank
                                e Paypal.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Formação</h3>
                            <p class="text-muted mb-0 text-justify">
                                Sou formado em Marketing e design para web, com pós-graduação
                                em Java, PHP e Javascript. Também uso e abuso de frameworks PHP
                                e Javascript, assim como sou adepto de bancos de dados inovadores
                                e performáticos como o MongoDB, mas sou apaixonado pela intuitividade
                                do Mysql com Eloquent.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Soluções práticas</h3>
                            <p class="text-muted mb-0 text-justify">
                                Num mundo cada vez mais globalizado, é fundamental alimentarmos a mente
                                dos novos programadores com uma necessidade constante de se reinventar,
                                de utilizar o novo, porém preservar o antigo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container">
                <div class="small text-center text-muted">
                    <a class="small text-center text-muted nav-link" href="https://popthings.000webhostapp.com/index.html">Copyright © 2020 - LsantosDeveloper </a>
                </div>
            </div>
        </footer>


         <!-- Bootstrap core JS-->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
         <!-- Third party plugin JS-->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
         <!-- Core theme JS-->
         <script src="{{ asset('site/js/script.js') }}"></script>
    </body>
</html>
