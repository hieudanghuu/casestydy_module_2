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
                                    <div class="col-12"><h1>Bảng User</h1></div>
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
                                            @foreach($users as $key => $user)
                                                <tr class="tr-shadow">
                                                    <td>
                                                        {{$users->firstItem() + $key}}
                                                    </td>
                                                    <td>
                                                        <img src="{{$user->avatar}}"
                                                             alt="sim_image"
                                                             style="max-width: 150px">
                                                    </td>
                                                    <td>{{$user->name}}</td>
                                                    <td>
                                                        <span class="block-email">{{$user->email}}</span>
                                                    </td>
                                                    <td>{{$user->address}}</td>
                                                    <td class="desc">{{$user->phone}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('dashboard.users.show',$user->id)}}" role="button" class="btn btn-info">Xem</a>
                                                            <a href="{{ route('user.edit', $user->id) }}" role="button" class="btn btn-warning">Sửa</a>
                                                            <form onclick="return confirm('Are you sure?')" action="{{ route('user.destroy', $user->id) }}" style="display:inline" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                            </form>
                                                        </div>
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
                    @include('dashboard.partials.footer')
                </div>
            </div>
        </div>
    </div>
@endsection



