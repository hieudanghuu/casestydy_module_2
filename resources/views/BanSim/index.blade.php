<!DOCTYPE html>
<html lang="en">
@include('BanSim.catalog.partials.head')
<body class="goto-here">
@include('BanSim.catalog.partials.header')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                     data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="{{asset('/minishop/images/sim3.jpg')}}" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                         data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <div class="horizontal">
                            <h1 class="mb-4 mt-3">{{trans('home.khauhieu1')}}</h1>
                                <p class="mb-4">{{trans('home.khauhieu2')}}</p>
                                <p><a href="{{ route('shop') }}" class="btn-custom">{{trans('home.khauhieu3')}}</a></p>
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
                    <img class="one-third order-md-last img-fluid" src="{{asset('/minishop/images/brsim5.png')}}" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                         data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">{{trans('home.khauhieu4')}}</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">
                                    {{trans('home.khauhieu5')}}</h1>
                                <p class="mb-4">{{trans('home.khauhieu2')}}</p>
                                <p><a href="{{route('shop')}}" class="btn-custom">{{trans('home.khauhieu3')}}</a></p>
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
                        <h3 class="heading">{{trans('home.tieuchi1')}}</h3>
                        <p>{{trans('home.tieuchi2')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">{{trans('home.tieuchi3')}}</h3>
                        <p>{{trans('home.tieuchi4')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-payment-security"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">{{trans('home.tieuchi5')}}</h3>
                        <p>{{trans('home.tieuchi6')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<h1 class="col-md-12  text-center text-danger">
    {{trans('home.tintuc')}} </h1>
<section class="ftco-section">


    <div class="container">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-6 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch row ">
                                <div>
                                    <a href="{{route('post.show', $post->id)}}" class="block-20">
                                        <img style='width: 500px' src='{{$post->image}}'/>
                                    </a>
                                </div>
                                <div class="text d-block pl-md-1 ">
                                    <div class="meta mb-3">
                                        <div><a href="#">{{ $post->created_at }}</a></div>
                                        <div><a href="#">Admin</a></div>
                                    </div>
                                    <h3 class="heading"><a href="{{ route('post.show', $post->id) }}">{{$post->name}}</a></h3>
                                    <p>{{ $post->post_title }}</p>
                                    <p><a href="{{ route('post.show', $post->id) }}" class="btn btn-primary py-2 px-3">{{trans('home.xemthem')}}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

    </div>
</section>

<section class="ftco-section ftco-degree-bg bg-warning">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">{{trans('home.khauhieu1')}}</h2>
                <p>{{trans('home.tieuchi2')}}</p>
            </div>
        </div>
    </div>
        <div class="row ">
            <div class="col-lg-8 order-lg-last ftco-animate ">
                <div class="row">
                    @foreach($sims as $key => $sim)
                    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <a href="#" class="img-prod">
                                <img class="img-fluid" src="{{ $sim->sim_image}}"
                                      alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>{{trans('home.khauhieu1')}}</span>
                                    </div>
                                </div>
                                <h3>{{trans('shop.name')}} : Sim <a href="#">{{$sim->sim_name}}</a></h3>
                                <div class="pricing">
                                    <p class="price"><span>{{$sim->sim_price}} 円</span><i
                                            class="fas fa-yen-sign"></i></p>
                                </div>
                                <form action="{{route('save.cart',$sim->sim_id)}}" method="get">
                                <p class="bottom-area d-flex px-3 ">
                                    <a href="{{route('show.sim',$sim)}}" class="add-to-cart text-center py-2 mr-1 col-6"><span>{{trans('home.chitiet')}}</span></a>
                                    <button  class=" buy-now d-flex text-center py-2 mr-1 col-5 "><a >{{trans('home.mua')}}<span><i
                                                class="ion-ios-cart ml-1"></i></span></a></button>
                                </p>
                                <input type="hidden" name="qty"
                                               class=" btn form-control  input-group"
                                              value="1" min="1" max="100">

                                </form>
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
                            <input type="text" class="form-control"  name="key">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">{{trans('home.catalog')}}</h3>
                    <ul class="categories">
                        <li><a href="{{route('search.name','docomo')}}">Docomo </a></li>
                        <li><a href="{{route('search.name','softbank')}}">Softbank </a></li>
                        <li><a href="{{route('search.name','au')}}">Au</a></li>
                    </ul>
                </div>
            </div>
        </div>

</section>

<!-- .section -->

@include('BanSim.catalog.partials.footer')
@include('BanSim.catalog.partials.js')
</body>
</html>
