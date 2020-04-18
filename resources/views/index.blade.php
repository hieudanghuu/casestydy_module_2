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
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tổng Quát</h2>
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
                                                <span>Tổng số User</span>
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
                                                <span>Tổng số Oder</span>
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
                                                <span>Doanh Số Tháng</span>
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
                                                <span>Tổng Tiền</span>
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
                                            <h2 class="title-1 m-b-25">Oder Chưa Duyệt</h2>
                                            <div class="table-responsive table--no-card m-b-40">
                                                <table class="table table-borderless  table-earning">
                                                    <thead>
                                                    <tr>
                                                        <th>Thời Gian</th>
                                                        <th>ID Hóa Đơn</th>
                                                        <th>Tên người Order</th>
                                                        <th>Tổng Thanh Toán</th>
                                                        <th></th>
                                                  </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        @if($order->status == 1)
                                                        <tr>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>{{$order->user_name}}</td>
                                                            <td>{{$order->totals}} 円</td>
                                                            <td><a class="btn btn-danger text-white"
                                                                   href="{{route('dashboard.destroy.order',$order->order_id)}}">Xóa</a>
                                                                   <a class="btn btn-info text-white"
                                                                   href="{{route('dashboard.order.all_show',$order->order_id)}}">Chi Tiết</a>
                                                            </td>
                                                        </tr>
                                                        @endif
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
