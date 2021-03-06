@extends('BanSim.catalog.main')
@section('title','checkout')
@section('main')
    <div class="hero-wrap hero-bread mt-xl-5 "
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 550px"></div>
    <div class="col-12 mt-5">
        <section class="ftco-section ftco-degree-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-lg-last ftco-animate">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-12 d-flex ftco-animate">
                                    <div class="blog-entry align-self-stretch d-md-flex col-6">
                                        <a href="{{route('post.show',$post->id)}}" class="block-20">
                                            <img style='width: 350px ; height: auto'
                                                 src='{{$post->image}}'/>
                                        </a>
                                    </div>
                                    <div class="text d-block pl-md-1 col-6">
                                        <div class="meta mb-3">
                                            <div><a href="#">{{ $post->created_at }}</a></div>
                                            <div><a href="#">Admin</a></div>
                                        </div>
                                        <h3 class="heading"><a
                                                href="{{route('post.show',$post->id)}}">{{$post->name}}</a></h3>
                                        <p>{{ $post->title }}</p>
                                        <p><a href="{{ route('post.show', $post->id) }}"
                                              class="btn btn-primary py-2 px-3">詳細</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .col-md-8 -->
                    <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box">
                            <form action="#" class="search-form">
                                <div class="form-group">
                                    <span class="icon ion-ios-search"></span>
                                    <input type="text" class="form-control" >
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
                            @foreach($posts as $post)
                                <div class="sidebar-box ftco-animate">
                                    <h3 class="heading"><a
                                            href="{{ route('post.show', $post->id) }}">{{$post->name}}</a></h3>
                                    <div class="block-21 mb-4 d-flex">
                                        <a href="{{ route('post.show', $post->id) }}"> <img style="height:50px"
                                                                                            src='{{$post->image}}'/></a>
                                    </div>
                                    <div class="text d-block ">
                                        <div class="meta mb-3">
                                            <a href="#">{{ $post->title }}</a>

                                            <div>
                                                <a href="#"><span class="icon-calendar"></span> {{ $post->created_at }}
                                                </a>
                                            </div>
                                            <div><a href="#"><span class="icon-person"></span>Admin</a></div>
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
