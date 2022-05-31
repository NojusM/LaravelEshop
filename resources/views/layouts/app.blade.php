<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="anime shop,anime">
    <meta name="description" content="Best anime related shop in Lithuania">
    <meta name="author" content="">
    <title>Animazer</title>

    <!-- Favicon -->
    <link href="" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('bower_components/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">

    @yield('extra-css')
</head>

<body class="body-wrapper">
<a href="{{ url('/') }}" >
    <img align="left" class="nav-link" height = "90px" width="280px" src="http://localhost:8000/uploads/about/main.png" alt="Animazer">
</a>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">

{{--                    <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                        Animazer--}}
{{--                    </a>--}}

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">


                            <li class="nav-item">
                                <a class="nav-link" href="{{route('rytu.index')}}">Virtuvė</a>
                            </li>

{{--                            ,['category' => $categories->id]--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('figureles.index')}}">Kolekcinės figūrėlės</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('atributika.index')}}">Aksesuarai</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('puodeliai.index')}}">Puodeliai</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about') }}">Apie mus</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('krepselis.index')}}">Krepšelis
                                    @if(Cart::count() > 0)
                                    <span class="numberCircle">{{Cart::count()}}</span>
                                    @endif
                                </a>
                            </li>
                            @auth

                                <li class="nav-item">
                                    <a class="nav-link" style="color: red" href="{{ url('/admin') }}">Admin</a>
                                </li>



                            <li class="nav-item">
                                <a class="nav-link" style="color: red" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            @endauth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" style="color: red" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: red" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="bg-1">
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h1>@yield('title')</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p>Copyright © <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script>. All Rights Reserved, theme by <a class="text-primary" href="https://themefisher.com" target="_blank">themefisher.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
        <!-- To Top -->

    </footer>

    <!-- JavaScripts -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('bower_components/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('extra-js')
</div>
</body>

</html>
