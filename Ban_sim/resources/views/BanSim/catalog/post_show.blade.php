@extends('BanSim.catalog.main')
@section('title','post')
@section('main')
    <div class="col-lg-8 order-lg-last ftco-animate">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-12 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch d-md-flex">
                        <a href="blog-single.html" class="block-20">
                            <img style='width: 350px ; height: auto'
                                 src='/minishop/images/{{$post->image}}'/>
                        </a>
                        <div class="text d-block pl-md-1">
                            <div class="meta mb-3">
                                <div><a href="#">{{ $post->created_at }}</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">新製品に関するニュース</a></h3>
                            <p>{{ $post->post_title }}</p>
                            <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">詳細</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
