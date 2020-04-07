@extends('dashboard.partials.main')
@section('title','Sim')
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
                                        <div class="col-12"><h1>Bảng Sim đã xóa</h1></div>
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
                                                <th>STT</th>
                                                <th scope="col">Tên Sim</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Loại</th>
                                                <th scope="col">Ngôn ngữ</th>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Điều Chỉnh</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="sims">
                                            @foreach($sims as $key => $sim)
                                                @if(count($sims) == 0)
                                                    <tr>
                                                        <td colspan="4">Không có dữ liệu</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        {{$sims->firstItem() + $key}}
                                                        <td>{{ $sim->sim_name }}</td>
                                                        <td>{{ $sim->sim_price }}<a><i class="fa fa-yen-sign"></i></a>
                                                        </td>
                                                        <td>@foreach($categories as $category)
                                                                @if ($sim->sim_category_id === $category->category_id)
                                                                    {{ $category->category_name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        @if( $sim->locale == 'vi')
                                                            <td>tiếng Việt</td>
                                                        @else
                                                            <td>tiếng Nhật</td>
                                                        @endif
                                                        <td>
                                                            <img src="{{$sim->sim_image }}"
                                                                 alt="sim_image"
                                                                 style="max-width: 150px">
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block">
                                                                <div>
                                                                    <a class="btn bg-success" style="width: 120px"
                                                                       onclick="return confirm('bạn có thực sự muốn khôi phục lại không?')"
                                                                       href="{{route('dashboard.sim.restore',$sim->sim_id)}}"><i
                                                                            class="fa fa-retweet"></i>Khôi phục</a>
                                                                </div>
                                                                <div class="dropdown d-inline-block ">
                                                                    <div>
                                                                        <form class="d-inline"
                                                                              action="{{route('dashboard.sim.forceDelete',$sim->sim_id)}}"
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
            <br><br><br><br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>プレステージ-品質-耐久性 </p>
                        <p><a
                                href="{{route('index')}}">
                                <img src="{{asset('minishop/cooladmin/images/icon/logo1.jpg')}}" style="height:75px"
                                     alt="CTS Admin"/>
                            </a></p>
                        <p>7-45-3グリーンヒルハヶ崎304 Matsudo, Chiba</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


