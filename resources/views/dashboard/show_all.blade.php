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
                                    <a href="{{route('cart')}}" class="nav-link">
                                            <span class="icon-shopping_cart btn-warning  ">
                                            </span>[{{Cart::count()}}]
                                    </a>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{asset('minishop/cooladmin/images/icon/3.jpg')}}"
                                                 alt="John Doe"/>
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
                                <div class="btn btn-success "><a class="text-white" href="{{route('dashboard')}}">Back </a>
                                </div>
                                <div class="table-responsive table-responsive-data2 mt-5">
                                    <div class="col-12 text-center"><h1>
                                            Thông tin khách hàng</h1></div>
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-data2 mt-5">
                                            <thead class="table-warning">
                                            <tr>
                                                <th>ID</th>
                                                <th>Avatar</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Địa Chỉ</th>
                                                <th>Điện Thoại</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="tr-shadow">
                                                <td>
                                                    {{$order->order_id}}
                                                </td>
                                                <td>
                                                    <img src="{{ 'data:image/jpeg;base64,'.$order->order_image }}"
                                                         alt="image"
                                                         style="max-width: 150px">
                                                </td>
                                                <td>{{$order->user_name}}</td>
                                                <td>
                                                    <span class="block-email">{{$user->email}}</span>
                                                </td>
                                                <td>{{$order->address}}</td>
                                                <td class="desc">{{$order->phone}}</td>
                                                <td>{{$order->note}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2 mt-5">
                                    <div class="col-12 text-center"><h1>Thông Tin Sản Phẩm</h1></div>
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-data2 mt-5">
                                            <thead class="table-warning">
                                            <tr>
                                                <th>ID</th>
                                                <th>Ảnh</th>
                                                <th>Sản Phẩm</th>
                                                <th>Giá</th>
                                                <th>Số Lượng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product_orders as $product_order)
                                            <tr class="tr-shadow">
                                                <td>
                                                    {{$product_order->id}}
                                                </td>
                                                <td>
                                                    <img src="{{$product_order->image }}"
                                                         alt="image"
                                                         style="max-width: 150px">
                                                </td>
                                                <td>{{$product_order->product}}</td>
                                                <td>{{$product_order->prices}}</td>
                                                <td>{{$product_order->quantity}}</td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div  class="btn btn-warning">Tổng Tiền :
                                        <input type="text" style="color-interpolation-filters: auto" value="{{$order->totals . "  円"}}">
                                    </div>

                                    <a href="{{route('dashboard.table.confirm',$order->order_id)}} "
                                       class="btn btn-outline-success">
                                        Xác nhận giao hàng</a>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>


                    </div>
                </div>

            </div>
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
@endsection



