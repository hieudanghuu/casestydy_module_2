<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{route('index')}}">
                    <img src="{{asset('CoolAdmin/images/icon/logo.png')}}" alt="CoolAdmin"/>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li >
                    <a  href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        制御盤</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table')}}">
                        <i class="fas fa-calendar-alt"></i>

                        製品リスト</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table2')}}">
                        <i class="fas fa-calendar-alt"></i>
                        顧客リスト</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table3')}}">
                        <i class="fas fa-map-marker-alt"></i>請求書リスト</a>
                </li>

                <li>
                    <a href="{{route('dashboard.table4')}}">
                        <i class="fas fa-map-marker-alt"></i>ニュースリスト</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>
                        ページ</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('login')}}">
                                ログイン</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                アカウントを作成する</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('CoolAdmin/images/icon/logo-1.jpg')}}" alt="Cool Admin"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li >
                    <a  href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        制御盤</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table')}}">
                        <i class="fas fa-calendar-alt"></i>

                        製品リスト</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table2')}}">
                        <i class="fas fa-calendar-alt"></i>
                        顧客リスト</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table3')}}">
                        <i class="fas fa-map-marker-alt"></i>請求書リスト</a>
                </li>

                <li>
                    <a href="{{route('dashboard.table4')}}">
                        <i class="fas fa-map-marker-alt"></i>ニュースリスト</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>
                        ページ</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('login')}}">
                                ログイン</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                アカウントを作成する</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>


