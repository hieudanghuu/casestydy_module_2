@extends('dashboard.partials.main')
@section('title','show')
@section('content')
    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__">
                    <div class="container-fluid">
                        <form id="frmAddEdit" action="{{route('posts.update',$post_tran->id)}}" method="POST"
                              enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Sửa tin tức</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <input hidden id="Id" name="Id">
                                <div class="modal-body row">
                                    <div class="form-group col-12">
                                        <label for="recipient-name" class="col-form-label"><strong>Tên tin tức</strong></label>
                                        <p>Tiếng Việt :<input type="text" class="form-control" name="name"
                                                              id="post_title" value="{{$post_tran->name}}" required></p>
                                        <p>Tiếng Nhật :<input type="text" class="form-control" name="namejp"
                                                              id="post_title" value="{{$post_tranjp->name}}" required>
                                        </p>
                                    </div>
                                    <input type="hidden" name="locale" value="{{$post_tran->locale}}">
                                    <input type="hidden" name="post_id" value="{{$post_tran->post_id}}">
                                    <div class="form-group col-12">
                                        <div>
                                        <label for="recipient-name" class="col-form-label"><strong>Tình trạng</strong></label></div>
                                        <select name="status" id="">
                                            @if($post_tran->status == 1)
                                                <option value="1">online</option>
                                                <option value="0">not online</option>
                                            @else
                                                <option value="0">not online</option>
                                                <option value="1">online</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="exampleInputFile"><strong>Ảnh</strong></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="inputFile">File ảnh</label>
                                                <input type="file" name="images"
                                                       class="custom-file-input @error('images') is-invalid @enderror"
                                                       id="inputFile" value="{{$post_tran->image}}" alt="image">
                                            </div>
                                        </div>
                                        @error('images')
                                        <p class="text-danger">{{ $errors->first('images') }}</p>
                                        @enderror
                                        <div class="mt-2">
                                            @if (!empty($post_tran->image))
                                                <img class="w-25 img" src="{{$post_tran->image}}" alt="image">
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="recipient-name" class="col-form-label"><strong>Tiêu
                                                đề</strong></label>
                                        <p>Tiếng Việt :<input type="text" class="form-control" name="title"
                                                              id="post_title" value="{{$post_tran->title}} " required>
                                        </p>
                                        <p>Tiếng Nhật :<input type="text" class="form-control" name="titlejp"
                                                              id="post_title" value="{{$post_tranjp->title}}" required>
                                        </p>
                                    </div>
                                    <input type="hidden" name="locale" value="vi">
                                    <div class="form-group col-6">
                                        <label for="description">Nội dung tiếng Việt :</label>
                                        <textarea class="textarea" name="content" value="{{$post_tran->content}}"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $post_tran->content !!}</textarea>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="description">Nội dung tiếng Nhật :</label>
                                        <textarea class="textarea" name="contentjp" value="{{$post_tranjp->content}}"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $post_tranjp->content !!}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <div><button type="submit" class=" btn btn-primary ">Sửa</button></div>
                                    <div><a href="{{ route('posts.index') }}" class="btn btn-danger">Hủy</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#inputFile').on('change', function () {
            if (typeof (FileReader) != "undefined") {
                var image_holder = $(".img");
                image_holder.empty();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img').attr('src', e.target.result);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        })
    </script>

@endsection

