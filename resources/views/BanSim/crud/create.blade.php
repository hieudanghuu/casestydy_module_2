@extends('BanSim.catalog.main')
@section('title','create')

@section('main')

    <script>
        function selectFile() {
            document.getElementById('buttonFile').click()
        }
    </script>
    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{asset('minishop/images/bg_6.jpg')}}');height: 380px">

    </div>
    <div class="col-12 col-md-12 mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Thêm sản phẩm mới</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('sim.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Tên Sim</label>
                        <input type="text" class="form-control" name="sim_name" placeholder="tên sim" required>
                        <p class="help is-danger" style="color:#FF0000" ;>{{ $errors->first('name') }}</p>

                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" class="form-control" name="sim_price" placeholder="nhập giá" required>
                        <p class="help is-danger " style="color:#FF0000" ;>{{ $errors->first('price') }}</p>
                    </div>
                    <div class="form-group ">
                        <label for="price">Tình Trạng :</label>
                        <select name="status" id="" required>
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group row">
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
                            <label for="sim_category_id">Phân loại :</label>
                            <select name="sim_category_id" id="sim_category_id">
                                <option value="1">Docomo</option>
                                <option value="2">Softbank</option>
                                <option value="3">Au</option>
                            </select>
                        </div>
                        <input type="hidden" name ="locale" value="vi">
                        <div class="form-group col-6">
                            <label for="description">Nội dung tiếng Việt :</label>
                            <textarea class="textarea" name="description" placeholder="Nhập nội dung"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="description">Nội dung tiếng Nhật :</label>
                            <textarea class="textarea" name="description1" placeholder="Nhập nội dung"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <button type="submit" class="mb-5 btn btn-primary">Tạo mới</button>
                    </div>
                </form>
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

