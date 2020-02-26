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
            <header class="header-desktop">
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
                                <div class="noti-wrap">
                                    <li class="nav-item cta cta-colored">
                                        <a href="{{route('cart')}}" class="nav-link">
                                            <span class="icon-shopping_cart btn-warning  ">
                                            </span>[{{Cart::count()}}]
                                        </a>
                                    </li>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{asset('CoolAdmin/images/icon/3.jpg')}}" alt="John Doe"/>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name}}</a>
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
                                        <i class="zmdi zmdi-plus"></i>add item</a>
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
                                                <h2>20</h2>
                                                <span>その日を売った</span>
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
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$total}}</h2>
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

                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">販売アイテム</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                        <tr>
                                            <th>時間</th>
                                            <th>請求書 ID</th>
                                            <th>製品名</th>
                                            <th class="text-right">価格</th>
                                            <th class="text-right">量</th>
                                            <th class="text-right">合計</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)

                                            <tr>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->order_product}}</td>
                                                <td class="text-right">{{$order->order_prices.'円'}}</td>
                                                <td class="text-right">{{$order->quantity}}</td>
                                                <td class="text-right">{{$order->totals}} 円</td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td class="text-right">$119,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td class="text-right">$70,261.65</td>
                                                </tr>
                                                <tr>
                                                    <td>United Kingdom</td>
                                                    <td class="text-right">$46,399.22</td>
                                                </tr>
                                                <tr>
                                                    <td>Turkey</td>
                                                    <td class="text-right">$35,364.90</td>
                                                </tr>
                                                <tr>
                                                    <td>Germany</td>
                                                    <td class="text-right">$20,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>France</td>
                                                    <td class="text-right">$10,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td class="text-right">$5,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>Italy</td>
                                                    <td class="text-right">$1639.32</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
@endsection
<!-- Jquery JS-->
@include('dashboard.partials.js')


<!-- end document-->
