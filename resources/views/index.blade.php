@extends('dashboard.partials.main')
@section('title','index')
@include('dashboard.partials.head')
@section('content')
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
    @include('dashboard.partials.header')
    <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop bg-warning">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="{{route('search.sim')}}" method="get">
                                <input class="au-input au-input--xl" type="text" name="key" placeholder="探している"/>
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>

                            <div class="header-button">
                                <a href="{{route('cart')}}" class="nav-link">
                                            <span class="icon-shopping_cart btn-warning  ">
                                            </span>[{{Cart::count()}}]
                                </a>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu ">
                                        <div class="image">
                                            <img src="{{asset('minishop/cooladmin/images/icon/3.jpg')}}"
                                                 alt="{{ Auth::user()->name}}"/>
                                        </div>

                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name}}</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('minishop/cooladmin/images/icon/3.jpg')}}"
                                                         alt="{{ Auth::user()->name}}"/>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ Auth::user()->name}}</a>
                                                </h5>
                                                <span class="email">hieu@123.com</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="#">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">一般化</h2>
                                    <a href="{{route('sim.create')}}" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>新規作成</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ \App\Order::all()->count()}}</h2>
                                                <span>購読している</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{\App\Order::all()->count()}}</h2>
                                                <span>固体アイテム</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$time}}</h2>
                                                <span>その月を売った</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            </div>
                                            <div class="text">
                                                <h2>{{$total}} <i class="fa fa-yen-sign"></i></h2>
                                                <span>収入</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2 class="title-1 m-b-25">販売アイテム</h2>
                                            <div class="table-responsive table--no-card m-b-40">
                                                <table class="table table-borderless  table-earning">
                                                    <thead>
                                                    <tr>
                                                        <th>時間</th>
                                                        <th>請求書 ID</th>
                                                        <th>製品名</th>
                                                        <th>合計</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>{{$order->user_name}}</td>
                                                            <td>{{$order->totals}} 円</td>
                                                            @if($order->status == 1)
                                                                <td><a class="btn btn-info text-white">未確認</a></td>
                                                            @else
                                                                <td><a class="btn btn-warning text-white">確認しました</a>
                                                                </td>
                                                            @endif
                                                            <td><a class="btn btn-danger text-white"
                                                                   href="{{route('dashboard.destroy.order',$order->order_id)}}">削除する</a>
                                                            </td>
                                                            <td>
                                                                <a class="au-btn-submit "
                                                                   href="{{route('dashboard.order.all_show',$order->order_id)}}"><i
                                                                        class=" btn zmdi zmdi-search"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
                <br><br><br><br><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>プレステージ-品質-耐久性 </p>
                            <p><a
                                    href="{{route('index')}}">
                                    <img src="{{asset('minishop/cooladmin/images/icon/logo1.jpg')}}"style="height:75px"alt="CTS Admin"/>
                                </a></p>
                            <p>7-45-3グリーンヒルハヶ崎304 Matsudo, Chiba</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Jquery JS-->
@include('dashboard.partials.js')


<!-- end document-->
