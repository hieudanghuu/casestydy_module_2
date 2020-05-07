@extends('BanSim.catalog.main')
@section('title','post')
@section('main')
    <div class="hero-wrap hero-bread mt-xl-5 "
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 550px"></div>
    <div class="col-12 mt-5">
        <section class="ftco-section ftco-degree-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-lg-last ftco-animate">
                        <div >
                            <div><a href="#">{{ $post->created_at }}</a>
                                <a href="#"><span class="icon-person"></span>Admin</a></div>
                            <div class="col-md-12 d-flex ftco-animate mt-2">
                                <div class="blog-entry align-self-stretch d-md-flex">
                                    <img style="height:300px" src='{{$post->image}}'/>
                                    <div class="text d-block pl-md-1">
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">新製品に関するニュース</a></h3>
                            <div class=" mt-2"><strong>{{ $post->post_title }}</strong></div>
                            <div class="mt-5">
                                <p> {{$post->content}}</p>
                            </div>

                        </div>
                        <br><br>
                        <div class="fb-like" data-href="https://cts-japan.herokuapp.com/post/{{$post->id}}" data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
                    </div> <!-- .col-md-8 -->
                    <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box">
                            <form action="{{route('search.sim')}}" class="search-form" method="get">
                                <div class="form-group">
                                    <span class="icon ion-ios-search"></span>
                                    <input name="key" type="text" class="form-control" placeholder="Type a keyword and hit enter">
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

                        <div class="sidebar-box ftco-animate">
                            @foreach($posts as $item)
                                <div class="sidebar-box ftco-animate">
                                    <h3 class="heading">最近のニュース</h3>
                                    <div class="block-21 mb-4 d-flex">
                                        <img style="height:50px" src='{{$item->image}}'/>
                                        
                                    </div>
                                    <div class="text d-block ">
                                        <div class="meta mb-3">
                                            <a href="{{route('post.show',$item->id)}}">{{ $item->post_title }}</a>
                                            <div>
                                                <a href="#"><span class="icon-calendar"></span> {{ $item->created_at }}
                                                </a>
                                            </div>
                                            <div><a href="#"><span class="icon-person"></span>Admin</a></div>
                                            <div id="fb-root"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section> <!-- .section -->
    </div>
@endsection

