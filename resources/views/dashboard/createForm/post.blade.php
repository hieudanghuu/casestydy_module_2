@extends('dashboard.partials.main')
@section('title','show')
@section('content')
    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__">
                    <div class="container-fluid">
                        <form id="frmAddEdit" action="{{route('posts.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tạo mới tin tức</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <input hidden id="Id" name="Id">
                                <div class="modal-body row">
                                    <div class="form-group col-12">
                                        <label for="recipient-name" class="col-form-label"><strong>Tên tin tức</strong></label>
                                        <p>Tiếng Việt :<input type="text" class="form-control" name="name"
                                                              id="post_title" required></p>
                                        <p>Tiếng Nhật :<input type="text" class="form-control" name="namejp"
                                                              id="post_title" required></p>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="inputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="images"
                                                       class="custom-file-input @error('images') is-invalid @enderror"
                                                       id="inputFile" value="{{ old('images')}}">
                                                <label class="custom-file-label" for="inputFile">file Ảnh</label>
                                            </div>
                                        </div>
                                        @error('images')
                                        <p class="text-danger">{{ $errors->first('images') }}</p>
                                        @enderror
                                        <div class="mt-2">
                                            <img class="w-25 img" src="" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="recipient-name" class="col-form-label"><strong>Tiêu
                                                đề</strong></label>
                                        <p>Tiếng Việt :<input type="text" class="form-control" name="title"
                                                              id="post_title" required></p>
                                        <p>Tiếng Nhật :<input type="text" class="form-control" name="titlejp"
                                                              id="post_title" required></p>
                                    </div>
                                    <input type="hidden" name="locale" value="vi">
                                    <div class="form-group col-6">
                                        <label for="description">Nội dung tiếng Việt :</label>
                                        <textarea class="textarea" name="content" placeholder="Nhập nội dung"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="description">Nội dung tiếng Nhật :</label>
                                        <textarea class="textarea" name="contentjp" placeholder="Nhập nội dung"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <button type="submit" class="mb-5 btn btn-primary col-1">Tạo mới</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote({
                height: 150
            })
        })
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
