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
                                            <img src="{{asset('minishop/cooladmin/images/icon/3.jpg')}}" alt="John Doe"/>
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


                                <div class="table-responsive table-responsive-data2 mt-5">
                                    <div class="col-12"><h1>顧客リスト</h1></div>
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-data2 mt-5">
                                            <thead class="table-warning">
                                            <tr>
                                                <th>ID</th>
                                                <th>名前</th>
                                                <th>メール</th>
                                                <th>住所</th>
                                                <th>電話</th>
                                                <th>レベル</th>
                                                <th>初期化時間</th>
                                                <th>修正する</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)

                                                <tr class="tr-shadow">
                                                    <td>
                                                        {{$user->id}}
                                                    </td>
                                                    <td>{{$user->name}}</td>
                                                    <td>
                                                        <span class="block-email">{{$user->email}}</span>
                                                    </td>
                                                    <td>{{$user->address}}</td>
                                                    <td class="desc">{{$user->phone}}</td>
                                                    <td>{{$user->level}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="{{ route('sim.edit', $user->id) }}"
                                                                   class="btn bg-warning text-dark">修正する</a>
                                                            </div>
                                                            <div class="col">
                                                                <form
                                                                    action="{{ route('dashboard.destroy.user', $user->id) }}"
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
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
        </div>

    </div>
@endsection



