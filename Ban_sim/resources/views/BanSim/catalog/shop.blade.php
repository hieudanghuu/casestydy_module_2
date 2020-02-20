@extends('BanSim.catalog.main')
@section('title','Shop')
@section('main')
    <div class="hero-wrap hero-bread mt-xl-5 "
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 380px"></div>
    <div class="col-12 mt-5">
        @if (Session::has('success'))
            <h1><p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            </h1>
        @endif
    </div>
    <section class="ftco-section bg-light mt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        @foreach($sims as $key => $sim)
                            <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                                <div class="product d-flex flex-column">
                                    <a href="#" class="img-prod">
                                        <img class="img-fluid " src="{{ 'data:image/jpeg;base64,'.$sim->sim_image }}"
                                             style="height:180px" alt="Colorlib Template">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 pb-4 px-3">
                                        <div class="d-flex">
                                            <div class="cat">
                                                <span>新しいシム2020</span>
                                            </div>
                                            <div class="rating">
                                                <p class="text-right mb-0">
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <h3><a href="#">プレステージ-品質-耐久性</a></h3>
                                        <div class="pricing">
                                            <p class="price"><span>{{$sim->sim_price}} 円</span><i
                                                    class="fas fa-yen-sign"></i></p>
                                        </div>
                                        <p class="bottom-area d-flex px-3">
                                            <a href="#"
                                               class="add-to-cart text-center py-2 mr-1"><span>カートに追加</span></a>
                                            <a href="{{route('save.cart',$sim->sim_id)}}"
                                               class="buy-now text-center py-2">買う<span><i
                                                        class="ion-ios-cart ml-1"></i></span></a>
                                        </p>
                                        <span>

                                            <div class="col-8 input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">量</span>
                                                </div>
                                                <input type="number" name="qty"
                                                       class="quantity form-control input-number"
                                                       value="1" min="1" max="100">
                                            </div>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col text-center">
                                    <div class="block-27">
                                        {{ $sims->links()}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                                                <input type="number" class="form-control" name="value1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">マデ:</label>
                                                <i class="icon icon-arrow-down3"></i>
                                                <input type="number" class="form-control" name="value2">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-info text-dark">見つける</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
