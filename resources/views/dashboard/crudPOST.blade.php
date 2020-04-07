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
                                        <div class="col-12"><h1>Bảng Tin tức</h1>
                                            <br>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="{{route('posts.create')}}" class="btn btn-info">Thêm mới</a>
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            @if (Session::has('success'))
                                                <p class="text-success">
                                                    <i class="fa fa-check"
                                                       aria-hidden="true"></i>{{ Session::get('success') }}
                                                </p>
                                            @endif
                                        </div>
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
                                            @foreach($posts as $key => $post)
                                                <tr>
                                                    <td>{{$posts->firstItem() + $key}}</td>
                                                    <td><img src="{{$post->image}}" alt="image"
                                                             style="max-width: 150px"></td>
                                                    <td>{{$post->name}}</td>
                                                    <td><a href="{{route('posts.show',$post->id +1)}}">Xem Tiếng
                                                            Nhật</a></td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('posts.show', $post->id) }}" role="button"
                                                               class="btn btn-info">Xem</a>
                                                            <a href="{{ route('posts.edit',$post->id) }}"
                                                               role="button" class="btn btn-warning">Sửa</a>
                                                            <form onclick="return confirm('Are you sure?')"
                                                                  action="{{ route('posts.destroy', $post->id) }}"
                                                                  style="display:inline" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Xóa
                                                                </button>
                                                            </form>
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


