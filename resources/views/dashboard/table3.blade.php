@extends('dashboard.partials.main')
@section('title','table')
@section('content')

    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <div class="table-responsive m-b-40">
                                            <div class="col-12">
                                                <h1>Đơn hàng đang chờ xử lý</h1></div>
                                            <table class="table table-borderless table-data3 mt-5">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Avata User</th>
                                                    <th>Tên</th>
                                                    <th>Tổng số tiền</th>
                                                    <th>Số Điện Thoại</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Time oder</th>
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
                                                                    alt="image"
                                                                    style="max-width: 50px">
                                                            </td>
                                                            <td>{{$order->user_name}}</td>
                                                            <td>{{$order->totals}}<i class="fa fa-yen-sign"></i></td>
                                                            <td>{{$order->phone}}</td>
                                                            <td>{{$order->address}}</td>
                                                            <td><a class="btn btn-info text-white">Chưa Duyệt</a></td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <a href="{{ route('dashboard.table3Edit', $order->order_id) }}"
                                                                           class="btn bg-warning text-dark">Sửa</a>
                                                                    </div>
                                                                    <div class="col-10">
                                                                        <form action="" method="post">
                                                                            @csrf

                                                                            <input type="submit"
                                                                                   class="btn bg-danger text-dark"
                                                                                   value="Xóa">
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-4">
                                                                    <a href="{{route('dashboard.table.confirm',$order->order_id)}} "
                                                                       class="btn btn-outline-success mt-3">
                                                                        Xác nhận giao hàng</a>
                                                                </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif


                                                @endforeach
                                                </tbody>
                                            </table>


                                            <div class="col-12 mt-5">
                                                <h1>Đơn hàng đã Duyệt</h1></div>
                                            <table class="table table-borderless table-data3 mt-5">
                                                <thead class="table-warning">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Avata</th>
                                                    <th>Tên</th>
                                                    <th>Tổng Tiền</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thời gian Oder</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    @if($order->status == 0)
                                                        <tr>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>
                                                                <img
                                                                    src="{{ 'data:image/jpeg;base64,'.$order->order_image }}"
                                                                    alt="sim_image"
                                                                    style="max-width: 50px">
                                                            </td>
                                                            <td>{{$order->user_name}}</td>
                                                            <td>{{$order->totals}}<i class="fa fa-yen-sign"></i></td>
                                                            <td>{{$order->phone}}</td>
                                                            <td>{{$order->address}}</td>
                                                            <td><a class="btn btn-warning text-white">Đã duyệt</a></td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="#" role="button"
                                                                       class="btn btn-info">Xem</a>
                                                                    <a href="{{  route('dashboard.table3Edit', $order->order_id) }} "
                                                                       role="button" class="btn btn-warning">Sửa</a>
                                                                    <form action="" method="post" >
                                                                    <input
                                                                        type="submit" class="
                                                                        btn bg-danger text-dark"
                                                                    value="Xóa">
                                                                    </form>
                                                                </div>
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
                    @include('dashboard.partials.footer')
                </div>
            </div>
        </div>
    </div>
@endsection




