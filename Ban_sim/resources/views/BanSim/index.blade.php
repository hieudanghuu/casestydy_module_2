<!DOCTYPE html>
<html lang="en">
@include('BanSim.catalog.partials.head')
<body class="goto-here">
@include('BanSim.catalog.partials.header')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel mt-2">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                     data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="{{asset('/minishop/images/sim3.jpg')}}" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                         data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading"> 以来</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">新しいシム2020</h1>
                                <p class="mb-4">プレステージ-品質-耐久性</p>

                                <p><a href="#" class="btn-custom">今すぐ購入</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                     data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="{{asset('/minishop/images/sim9.png')}}" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                         data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#最新モデルのwifi</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">
                                    強い-長いバッテリー寿命</h1>
                                <p class="mb-4">プレステージ-品質-耐久性</p>

                                <p><a href="#" class="btn-custom">今すぐ購入</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                     data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="{{asset('/minishop/images/sim4.png')}}" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                         data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#最新モデル の wifi</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">
                                    強い-長いバッテリー寿命</h1>
                                <p class="mb-4">プレステージ-品質-耐久性</p>

                                <p><a href="#" class="btn-custom">今すぐ購入</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                     data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="{{asset('/minishop/images/sim5.jpg')}}" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                         data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#最新モデルのwifi</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">
                                    強い-長いバッテリー寿命</h1>
                                <p class="mb-4">プレステージ-品質-耐久性</p>
                                <p><a href="{{route('shop')}}" class="btn-custom">今すぐ購入</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-bag"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">送料無料</h3>
                        <p>顧客は神です、私たちは常に顧客のことを考えます</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">サポート顧客</h3>
                        <p>顧客満足度が最大の基準です.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-payment-security"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">安全な支払い</h3>
                        <p>今日をリードする便利な支払い名声.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<h1 class="col-md-12  text-center text-danger">
    シムに関する新しいニュース </h1>
{{-------------------------}}


<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last ftco-animate">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-12 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch d-md-flex">
                                <a href="blog-single.html" class="block-20">
                                    <img style='width: 250px ; height: auto' src='/minishop/images/{{$post->image}}'/>
                                </a>
                                <div class="text d-block pl-md-1">
                                    <div class="meta mb-3">
                                        <div><a href="#">{{ $post->created_at }}</a></div>
                                        <div><a href="#">Admin</a></div>
                                    </div>
                                    <h3 class="heading"><a href="#">新製品に関するニュース</a></h3>
                                    <p>{{ $post->post_title }}</p>
                                    <p><a href="{{ route('post.show', $post->id) }}" class="btn btn-primary py-2 px-3">詳細</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-3 sidebar ftco-animate">
                <div class="sidebar-box">

                    <form action="{{route('search.sim')}}" class="search-form" method="get">
                        <div class="form-group">
                            <span class="icon ion-ios-search"></span>
                            <input type="text" class="form-control" placeholder="探している" name="key">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">カタログ</h3>
                    <ul class="categories">
                        <li><a href="{{route('search.name','docomo')}}">Docomo <span></span></a></li>
                        <li><a href="{{route('search.name','softbank')}}">Softbank <span></span></a></li>
                        <li><a href="{{route('search.name','au')}}">Au<span></span></a></li>
                    </ul>
                </div>
{{--                @foreach($posts as $post)--}}
{{--                    <div class="sidebar-box ftco-animate">--}}
{{--                        <h3 class="heading">最近のニュース</h3>--}}
{{--                        <div class="block-21 mb-4 d-flex">--}}
{{--                            <img style="height:50px" src='/minishop/images/{{$post->image}}'/>--}}
{{--                        </div>--}}
{{--                            <div class="text d-block ">--}}
{{--                                <div class="meta mb-3">--}}
{{--                                    <h3 class="heading-1 text-left-10"><a href="#">{{ $post->post_title }}</a></h3>--}}
{{--                                    <div>--}}
{{--                                        <a href="#"><span class="icon-calendar"></span> {{ $post->created_at }}</a>--}}
{{--                                    </div>--}}
{{--                                    <div><a href="#"><span class="icon-person"></span>Admin</a></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
</section>


<!-- .section -->

<section class="ftco-section bg-warning">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">新しいモデル2020</h2>
                <p>顧客は神です、私たちは常に顧客のことを考えます</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row">
                    @foreach($sims as $key => $sim)
                        <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                            <div class="product d-flex flex-column">
                                <a href="#" class="img-prod">
                                    <img class="img-fluid" src="{{ 'data:image/jpeg;base64,'.$sim->sim_image }}"
                                         style="height:180px" alt="Colorlib Template">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3">
                                    <div class="d-flex">
                                        <div class="cat">
                                            <span>新しいシム2020</span>
                                        </div>
                                    </div>
                                    <h3><a href="#">プレステージ-品質-耐久性</a></h3>
                                    <div class="pricing">
                                        <p class="price"><span>{{$sim->sim_price}} 円</span><i
                                                class="fas fa-yen-sign"></i></p>
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="#" class="add-to-cart text-center py-2 mr-1"><span>カートに追加</span></a>
                                        <a href="{{route('save.cart',$sim->sim_id)}}" class="buy-now text-center py-2">買う<span><i
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('BanSim.catalog.partials.footer')
@include('BanSim.catalog.partials.js')
</body>
</html>
