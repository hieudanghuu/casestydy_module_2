@extends('dashboard.partials.main')
@section('title','table')
@section('content')

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <!-- END HEADER MOBILE-->
    @include('dashboard.partials.header')
    <!-- MENU SIDEBAR-->
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
            <!-- END HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <div class="col-12"><h1>
                                                    未処理の注文</h1></div>
                                            <table class="table table-borderless table-data3">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>アバター画像</th>
                                                    <th>名前</th>
                                                    <th>製品名</th>
                                                    <th>量</th>
                                                    <th>価格</th>
                                                    <th>総額</th>
                                                    <th>電話</th>
                                                    <th>住所</th>
                                                    <th>状態</th>
                                                    <th>初期化時間</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    @if($order->status == 1)

                                                        <tr>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>
                                                                <img
                                                                    src="{{ 'data:image/jpeg;base64,'.$order->order_image }}"
                                                                    alt="sim_image"
                                                                    style="max-width: 50px">
                                                            </td>
                                                            <td>{{$order->user_name}}</td>
                                                            <td>{{$order->order_product}}</td>
                                                            <td>{{$order->quantity}}</td>
                                                            <td>{{$order->order_prices}}<i class="fa fa-yen-sign"></i>
                                                            </td>
                                                            <td>{{$order->totals}}<i class="fa fa-yen-sign"></i></td>
                                                            <td>{{$order->phone}}</td>
                                                            <td>{{$order->address}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a href="{{ route('dashboard.table3Edit', $order->order_id) }}"
                                                                           class="btn bg-warning text-dark">修正する</a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <form action="" method="post">
                                                                            @csrf
                                                                            <input type="submit"
                                                                                   class="btn bg-danger text-dark"
                                                                                   value="削除する">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-12 mt-5">
                                                <h1>注文が処理されました</h1></div>
                                            <table class="table table-borderless table-data3">
                                                <thead class="table-warning">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>アバター画像</th>
                                                    <th>名前</th>
                                                    <th>製品名</th>
                                                    <th>量</th>
                                                    <th>総額</th>
                                                    <th>電話</th>
                                                    <th>住所</th>
                                                    <th>状態</th>
                                                    <th>初期化時間</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    @if($order->status == 2)
                                                        <tr>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>
                                                                <img
                                                                    src="{{ 'data:image/jpeg;base64,'.$order->order_image }}"
                                                                    alt="sim_image"
                                                                    style="max-width: 50px">
                                                            </td>
                                                            <td>{{$order->user_name}}</td>
                                                            <td>{{$order->order_product}}</td>
                                                            <td>{{$order->quantity}}<i class="fa fa-yen-sign"></i></td>
                                                            <td>{{$order->totals}}<i class="fa fa-yen-sign"></i></td>
                                                            <td>{{$order->phone}}</td>
                                                            <td>{{$order->address}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a href="{{ route('dashboard.table3Edit', $order->order_id) }}"
                                                                           class="btn bg-warning text-dark">修正する</a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <form
                                                                            action=""
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="submit"
                                                                                   class="btn bg-danger text-dark"
                                                                                   value="削除する">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE-->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




