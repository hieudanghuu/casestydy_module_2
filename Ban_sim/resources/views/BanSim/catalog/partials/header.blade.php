<!DOCTYPE html>
<html lang="en">
<head>
    <title>Minishop - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('minishop/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('minishop/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('minishop/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('minishop/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('minishop/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('minishop/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('minishop/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('minishop/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('minishop/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('minishop/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('minishop/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('minishop/css/style.css')}}">
</head>
<body class="goto-here">
<div class="py-1 bg-black">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+81 80-9436-7979</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">7-45-3グリーンヒルハヶ崎304 Matsudo, Chiba</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">C.T.S 株式会社</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="dataSearch">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">
                        ホームページ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">カタログ</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('shop')}}">店</a>
                        <a class="dropdown-item" href="{{route('cart')}}">カート</a>
                        <a class="dropdown-item" href="{{ route('checkout') }}">お支払い</a>
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sim.index') }}">製品を編集する</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item cta cta-colored"><a href="{{route('cart')}}" class="nav-link"><span
                            class="icon-shopping-cart btn-warning "></span>[{{Cart::count()}}]</a></li>
                <form action="{{route('search.sim')}}" class="  mt-2" method="get">

                    <div class="sb hidden-sm-down flex-fill mr-5 mt-2">
                        <input placeholder="探している" name="key" value="" class="sb__input">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>見つける</button>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>






