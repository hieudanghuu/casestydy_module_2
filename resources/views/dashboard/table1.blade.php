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
                                <!-- DATA TABLE -->
                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-12"><h1>Bảng Sim</h1></div>
                                        <br>
                                        <a class="btn mb-5 bg-success mt-5"
                                           href="{{ route('sim.create') }}">Tạo Mới</a><br>
                                        <div class="col-12">
                                            @if (Session::has('success'))
                                                <p class="text-success">
                                                    <i class="fa fa-check"
                                                       aria-hidden="true"></i>{{ Session::get('success') }}
                                                </p>
                                            @endif
                                        </div>
                                        <table class="table table-striped">
                                            <thead class="table-danger">
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên Sim</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Loại</th>
                                                <th scope="col">Tiếng Nhật</th>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Điều Chỉnh</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="sims">
                                            @if(count($sims) == 0)
                                                <tr>
                                                    <td colspan="4">Không có dữ liệu</td>
                                                </tr>
                                            @else
                                                @foreach($sims as $key => $sim)
                                                    <tr>
                                                        <th scope="row">{{ $sims->firstItem() + $key }}</th>
                                                        <td>{{ $sim->sim_name }}</td>
                                                        <td>{{ $sim->sim_price }}<a><i class="fa fa-yen-sign"></i></a>
                                                        </td>
                                                        <td>@foreach($categories as $category)
                                                                @if ($sim->sim_category_id === $category->category_id)
                                                                    {{ $category->category_name }}
                                                                @endif
                                                            @endforeach
                                                        </td>

                                                        <td> <a href="{{route('show.sim',$sim->sim_id + 1)}}">Xem tiếng Nhật</a></td>

                                                        <td>
                                                            <img src="{{$sim->sim_image }}"
                                                                 alt="sim_image"
                                                                 style="max-width: 150px">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ route('show.sim', $sim->sim_id) }}" role="button" class="btn btn-info">Xem</a>
                                                                <a href="{{ route('sim.edit', $sim->sim_id) }}"
                                                                   role="button" class="btn btn-warning">Sửa</a>
                                                                <form onclick="return confirm('Are you sure?')"
                                                                      action="{{ route('sim.destroy', $sim->sim_id) }}"
                                                                      style="display:inline" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        {{ $sims->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
@endsection


