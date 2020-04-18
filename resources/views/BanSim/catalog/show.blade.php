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
                            <div class="col-sm-7">
                                <h3 class="d-inline-block d-sm-none"></h3>

                                    <img src="{{$sim->sim_image}}" class="product-image" alt="Product Image" style="width: 400px">

                            </div>
                            <div class="col-sm-5">
                            <span style="font-size: 32px"><strong> {{trans('shop.name')}} :</strong>
                                    {{$sim->sim_name}}
                                </span>
                                <div>
                                    <p style="font-size: 32px"><strong>{{trans('shop.category')}} : </strong> {{$category->category_name}}</p>
                                </div>
                                <div>
                                    <p style="font-size: 32px"><strong>{{trans('shop.gia')}} : </strong> {{$sim->sim_price}} 円</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                       href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">{{trans('shop.discription')}}</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                       href="#product-comments" role="tab" aria-controls="product-comments"
                                       aria-selected="false">{{trans('shop.status')}}</a>
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
                                        <option value="1">{{trans('shop.1')}}</option>
                                    @else
                                        <option value="0">{{trans('shop.0')}}</option>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">{{trans('shop.catalog')}}</h2>
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
                            <h2 class="heading">{{trans('shop.price')}}</h2>
                            <form method="post" action="{{route('search.price')}}" class="colorlib-form-2">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">{{trans('shop.tu')}}:</label>
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
                                            <label for="guests">{{trans('shop.den')}}:</label>
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="number" class="form-control" name="value2" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-warning text-dark">{{trans('shop.search')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
