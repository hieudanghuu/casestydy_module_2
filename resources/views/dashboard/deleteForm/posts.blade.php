@extends('dashboard.partials.main')
@section('title','table')
@section('content')

    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-12"><h1>Bảng Tin tức đã xóa</h1>
                                            <br>
                                        </div>
                                        <div class="col-12">
                                            @if (Session::has('success'))
                                                <p class="text-success">
                                                    <i class="fa fa-check"
                                                       aria-hidden="true"></i>{{ Session::get('success') }}
                                                </p>
                                            @endif
                                        </div>
                                        <br>
                                        <table class="table table-striped">
                                            <thead class="table-danger">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Tên Tin Tức</th>
                                                <th scope="col">chuyển ngôn ngữ</th>
                                                <th scope="col">Sửa</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="postTable">
                                            @foreach($post_tran as $key => $post)
                                                <tr>
                                                    <td>{{$post_tran->firstItem() + $key}}</td>
                                                    <td><img src="{{$post->image}}" alt="image"
                                                             style="max-width: 150px"></td>
                                                    <td>{{$post->name}}</td>
                                                    <td><a href="{{route('posts.show',$post->id +1)}}">Xem Tiếng
                                                            Nhật</a></td>

                                                    <td>
                                                        <div class="d-inline-block">
                                                            <div>
                                                                <a class="btn bg-info" style="width: 120px"
                                                                   href="{{route('posts.show', $post->id)}}">Xem</a>
                                                            </div>
                                                            <div>
                                                                <a class="btn bg-warning" style="width: 120px"
                                                                   onclick="return confirm('bạn có thực sự muốn khôi phục lại không?')"
                                                                   href="{{route('dashboard.posts.restore', $post->id)}}">Khôi phục</a>
                                                            </div>
                                                            <div class="dropdown d-inline-block ">
                                                                <div>
                                                                    <form class="d-inline"
                                                                          action="{{route('dashboard.posts.forceDelete', $post->id)}}"
                                                                          method="get">
                                                                        @csrf
                                                                        <input type="submit" style="width: 120px"
                                                                               onclick="return confirm('bạn có thực sự muốn xóa')"
                                                                               class="btn bg-danger text-dark text-center"
                                                                               value="Xóa vĩnh viễn">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @include('dashboard.partials.footer')
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



