<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{route('index')}}">
                    <img src="{{asset('minishop/cooladmin/images/icon/logo.jpg')}}" style="height: 150px" alt="CoolAdmin"/>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile bg-dark ">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-calendar-alt"></i>
                        Trang chủ Admin </a>
                </li>
                <li>
                    <a href="{{route('dashboard.table')}}">
                        <i class="fas fa-calendar-alt"></i>

                        Bảng Sim</a>
                </li>
                <li>
                    <a href="{{route('dashboard.users')}}">
                        <i class="fas fa-calendar-alt"></i>
                        Bảng User</a>
                </li>
                <li>
                    <a href="{{route('dashboard.table3')}}">
                        <i class="fas fa-calendar-alt"></i>
                        Bảng Oder</a>
                </li>

                <li>
                    <a href="{{route('posts.index')}}">
                        <i class="fas fa-map-marker-alt"></i>Bảng Tin tức</a>
                </li>
                <li class="has-sub">
                    <a href="{{route('login')}}">
                         Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="menu-sidebar d-none d-lg-block">
    <div>
        <a href="{{route('index')}}">
            <img src="{{asset('minishop/cooladmin/images/icon/logo.jpg')}}"style="height:70px;width: 305px"alt="CTS Admin"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1 bg-dark" >
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Trang chủ Admin</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-calendar-alt"></i>Bảng Sim</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list bg-dark">
                        <li>
                            <a href="{{route('dashboard.table')}}">Danh sách sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.sim.delete')}}">Sản phẩm đã xóa </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-calendar-alt"></i>Bảng User</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list bg-dark">
                        <li>
                            <a href="{{route('dashboard.users')}}">Danh sách User</a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.users.delete')}}">User đã xóa </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-calendar-alt"></i>Bảng Oder</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list bg-dark">
                        <li>
                            <a href="{{route('dashboard.table3')}}">Danh sách Oder</a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.order.delete')}}">Oder đã xóa </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-calendar-alt"></i>Bảng Tin tức</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list bg-dark">
                        <li>
                            <a href="{{route('posts.index')}}">Danh sách Tin tức</a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.posts.delete')}}">Tin tức đã xóa </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('login')}}">
                        <i class="icon-person"></i>
                        Đăng xuất</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<header class="header-desktop bg-dark">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="{{route('search.sim')}}" method="get">
                    <input class="au-input au-input--xl" type="text" name="key" />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{asset('minishop/cooladmin/images/icon/3.jpg')}}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn text-light" href="#">{{ Auth::user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{asset('minishop/cooladmin/images/icon/3.jpg')}}" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name ">
                                            <a href="#">{{ Auth::user()->name}}</a>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email}}</span>
                                    </div>
                                </div>
                                {{-- <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div> --}}
                                <div class="account-dropdown__footer">
                                    <a href="{{route('login')}}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


