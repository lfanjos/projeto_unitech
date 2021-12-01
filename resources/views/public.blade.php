<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link href="{{asset('/public/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="
    https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/864872c2f6.js" crossorigin="anonymous"></script>

    <!-- Main Stylesheet File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</head>

<body>

<!--==========================
Header
============================-->
<header id="header" class="fixed-top noPrint">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-light"><a href="#header"><span>UniTech</span></a></h1>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="/#intro">Home</a></li>
                <li><a href="/#about">Sobre Nós</a></li>
                <li><a href="/#services">Serviços</a></li>
                <li><a href="/#contact">Contato</a></li>
                <li><a href="/restrito">Área Restrita</a></li>
                @auth
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="fake-a btn" style="height: 41p; border: none">
                            Log Out
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix noPrint">
    <div class="container">

        <div class="intro-img">
            @yield('img-intro')
        </div>

        <div class="intro-info">
            @yield('intro')
        </div>

    </div>
</section><!-- #intro -->

<main id="main">

    @yield('content')

</main>

<!--==========================
  Footer
============================-->
<footer id="footer" class="noPrint">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>UniTech</h3>
                    <p>A melhor escolha para a manutenção da sua empresa está aqui. Não deixe de contatar a gente, te
                        garantimos satisfação no resultado!</p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/#about">Sobre Nós</a></li>
                        <li><a href="/#services">Serviços</a></li>
                        <li><a href="/#contact">Contato</a></li>
                        <li><a href="/restrito">Área Restrita</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Fale Conosco</h4>
                    <p>
                        Av. Paulista, 1300 <br>
                        São Paulo, SP<br>
                        Brasil <br>
                        <strong>Tel:</strong> +55 11 98888-7777<br>
                        <strong>Email:</strong> contato@unitech.com.br<br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Newsletter</h4>
                    <p>
                        Quer ficar por dentro de tudo sobre tecnologia? Assine nosso newsletter e tenha toda semana em
                        seu email as notícias mais recentes do mundo da tecnologia. É gratuito
                    </p>
                    <form action="/newsletter" method="post">
                        @csrf
                        <input type="email" name="email"><input type="submit"  value="Assinar">
                    </form>
                    @if(!empty($mensagemNews))
                        {{ $mensagemNews }}
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>UniTech</strong>. Todos os Direitos Reservados
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/mobile-nav/mobile-nav.js') }}"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/requests.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
