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
                                <div class="table-responsive table-responsive-data2 mt-5">
                                    <div class="col-12"><h1>Bảng User đã xóa</h1></div>
                                    <div class="col-12">
                                        @if (Session::has('success'))
                                            <p class="text-success">
                                                <i class="fa fa-check"
                                                   aria-hidden="true"></i>{{ Session::get('success') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-data2 mt-5">
                                            <thead class="table-warning">
                                            <tr>
                                                <th>STT</th>
                                                <th>Avata</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                                <th>Số Điện Thoại</th>
                                                <th>Điều chỉnh</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="tr-shadow">
                                                    @foreach($users as $key => $user)
                                                        <td>
                                                            {{$users->firstItem() + $key}}
                                                        </td>
                                                    <td>
                                                        <img src="{{$user->avatar}}"
                                                             alt="image"
                                                             style="max-width: 150px">
                                                    </td>
                                                    <td>{{$user->name}}</td>
                                                    <td>
                                                        <span class="block-email">{{$user->email}}</span>
                                                    </td>
                                                    <td>{{$user->address}}</td>
                                                    <td class="desc">{{$user->phone}}</td>
                                                    <td>
                                                        <div class="d-inline-block">
                                                            <div>
                                                                <a class="btn bg-success" style="width: 120px"
                                                                   onclick="return confirm('bạn có thực sự muốn khôi phục lại không?')"
                                                                   href="{{route('dashboard.users.restore',$user->id)}}"><i
                                                                        class="fa fa-retweet"></i>Khôi phục</a>
                                                            </div>
                                                            <div class="dropdown d-inline-block ">
                                                                <div>
                                                                    <form class="d-inline"
                                                                          action="{{route('dashboard.users.forceDelete',$user->id)}}"
                                                                          method="get">
                                                                        @csrf

                                                                        <input type="submit" style="width: 120px"
                                                                               onclick="return confirm('bạn có thực sự muốn xóa')"
                                                                               class="btn bg-danger text-dark"
                                                                               value="Xóa">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                        @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
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




