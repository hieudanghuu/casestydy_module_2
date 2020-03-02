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
                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-12"><h1>製品リスト</h1></div>
                                        <br>
                                        <a class="btn mb-5 bg-success mt-5" href="{{ route('sim.create') }}">新しい追加</a><br>
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
                                                <th scope="col">ID</th>
                                                <th scope="col">製品名</th>
                                                <th scope="col">価格</th>
                                                <th scope="col">写真</th>
                                                <th scope="col">修正する</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id = "sims">
                                            @if(count($sims) == 0)
                                                <tr>
                                                    <td colspan="4">Không có dữ liệu</td>
                                                </tr>
                                            @else
                                                @foreach($sims as $key => $sim)
                                                    <tr>
                                                        <th scope="row">{{ $sim->sim_id }}</th>
                                                        <td>{{ $sim->sim_name }}</td>
                                                        <td>{{ $sim->sim_price }}<a><i class="fa fa-yen-sign"></i></a>
                                                        </td>
                                                        <td>@foreach($categories as $category)
                                                                @if ($sim->sim_category_id === $category->category_id)
                                                                    {{ $category->category_name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <img src="{{ 'data:image/jpeg;base64,'.$sim->sim_image }}"
                                                                 alt="sim_image"
                                                                 style="max-width: 150px">
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="{{ route('sim.edit', $sim->sim_id) }}"
                                                                       class="btn bg-warning text-dark">修正する</a>
                                                                </div>
                                                                <div class="col">
                                                                    <form
                                                                        action="{{ route('sim.destroy', $sim->sim_id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="submit"
                                                                               class="btn bg-danger text-dark"
                                                                               value="削除する">
                                                                    </form>
                                                                </div>
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


