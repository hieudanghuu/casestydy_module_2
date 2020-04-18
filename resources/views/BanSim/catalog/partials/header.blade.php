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
                    <div class="col-md pr-3 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">danghuuhieu08091989@gmail.com</span>
                    </div>
                    <div class="col-md pr-3 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center">
                            <span class="icon-facebook"><a
                                    href="https://www.facebook.com/ctsconnecttosucceed/">acebook</a></span>
                        </div>
                        <div class="col-md pr-2 d-flex topper align-items-center" style="margin:auto;" id="language_id">
                            <a href="{{ route('user.change-language-front',['en'])}}" ><img src='/image/icon-jp.png' style="width: 22px;height: 16px"/></a>
                            <a href="{{ route('user.change-language-front',['vi'])}}" ><img src='/image/icon-vn.png' style="width: 22px;height: 23px"/></a>
                        </div>
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
    <a class="navbar-brand" href="{{route('index')}}">{{ trans('nav.cty')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">
                {{trans('nav.home')}}</a></li>
                <li class="nav-item active"><a href="{{route('post.index')}}" class="nav-link">
                    {{trans('nav.news')}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{trans('nav.catalog')}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('shop')}}">{{trans('nav.shop')}}</a>
                        <a class="dropdown-item" href="{{route('cart')}}">{{trans('nav.cart')}}</a>
                        <a class="dropdown-item" href="{{route('contact')}}">{{trans('nav.contact')}}</a>
                        @if(Cart::count() > 0)
                        <a class="dropdown-item" href="{{ route('checkout') }}">{{trans('nav.checkout')}}</a>
                            @endif
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logins') }}">{{trans('nav.login')}}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('registration') }}">{{trans('nav.registration')}}</a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->name === 'hieu')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">{{trans('nav.dashboard')}}</a>
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
                                    {{trans('nav.logout')}}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    {{trans('nav.logout')}}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                @endguest
                <li class="nav-item cta cta-colored"><a href="{{route('cart')}}" class="nav-link"><span
                            class="icon-shopping-cart  btn-warning "></span>[{{Cart::count()}}]</a></li>
               <form action="{{route('search.sim')}}" class="  mt-2" method="get">

                    <div class="sb hidden-sm-down flex-fill mr-5 mt-2">
                       <input  name="key"  class="sb__input">
                       <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>{{trans('nav.search')}}</button>
                   </div>
               </form>
            </ul>
        </div>
    </div>
</nav>






