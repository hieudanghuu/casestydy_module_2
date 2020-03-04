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
                            <form class="form-header" method="get">
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
                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-12"><h1>投稿リスト</h1>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="javascript:void(0);" class="btn btn-info" data-toggle="modal"
                                               data-target="#addEditUser"
                                               onclick="post.openAddEditUser()">新規作成</a>
                                        </div>
                                        <br>
                                        <table class="table table-striped">
                                            <thead class="table-danger">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">製品名</th>
                                                <th scope="col">写真</th>
                                                <th scope="col">カテゴリー ID</th>
                                                <th scope="col">修正する</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="postTable">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>by design Hieu <a
                                                    href="https://colorlib.com">Colorlib</a>.</p>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->

    @include('dashboard.form.createPost')

@endsection
@section('jsHeader')
    <script src="{{asset("js/post.js")}}"></script>
@endsection


