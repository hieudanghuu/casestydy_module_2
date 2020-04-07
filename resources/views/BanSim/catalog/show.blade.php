@extends('BanSim.catalog.main')
@section('title','show')
@section('main')
    <div class="hero-wrap hero-bread mt-xl-5 "
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 550px"></div>

    <section class="content mt-5">
        <!-- Default box -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <h3 class="d-inline-block d-sm-none"></h3>
                                <div class="col-12">
                                    <img src="{{$sim->sim_image}}" class="product-image" alt="Product Image" style="width: 400px">
                                </div>
                            </div>
                            <div class="col-12 col-sm-9">
                                <h3 class="my-3">{{$sim->sim_name}}</h3>
                                <div>

                                    <p><strong>Phân Loại : </strong> {{$category->category_name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                       href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô Tả</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                       href="#product-comments" role="tab" aria-controls="product-comments"
                                       aria-selected="false">Trạng Thái</a>
                                    <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> -->
                                </div>
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                     aria-labelledby="product-desc-tab">
                                    <div class="content">

                                        {!!$sim->description!!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                     aria-labelledby="product-comments-tab">
                                    @if($sim->status == 1)
                                        <option value="1">Online</option>
                                    @else
                                        <option value="0">Not online</option>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">カテゴリー</h2>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="text-danger" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="collapsed"
                                                   href="{{route('search.name','docomo')}}">Docomo
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="text-primary" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="{{route('search.name','softbank')}}"
                                                >Softbank
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed"
                                                   href="{{route('search.name','au')}}"
                                                >Au
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>

                        </script>
                        <div class="sidebar-box-2">
                            <h2 class="heading">価格帯</h2>
                            <form method="post" action="{{route('search.price')}}" class="colorlib-form-2">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">からの価格:</label>
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="number" class="form-control" name="value1" required>
                                            <div class="col-12">
                                                @if (Session::has('danger'))
                                                    <p class="text-danger">
                                                        <i class="fa fa-check"
                                                           aria-hidden="true"></i>{{ Session::get('danger') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">マデ:</label>
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="number" class="form-control" name="value2" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-warning text-dark">見つける</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
