@extends('dashboard.partials.main')
@section('title','show')
@section('content')

<div class="page-wrapper">
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__">
                <div class="container">
                    <div class="col-12 col-md-12 mt-5">
                         <div class="row">
                             <div class="col-12"><h1>Chỉnh sửa sản phẩm</h1></div>
                                <div class="col-12">
                    <form method="post" action="{{ route('sim.update',$sim->sim_id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <div class="form-group col-12">
                                <label for="name">Tên Sim</label>
                                <input type="text" class="form-control" name="sim_name" value="{{ $sim->sim_name }}"
                                       required>
                                <p class="help is-danger" style="color:#FF0000" ;>{{ $errors->first('name') }}</p>

                            </div>
                            <div class="form-group  col-12">
                                <label for="price">Giá</label>
                                <input type="text" class="form-control" name="sim_price" value="{{ $sim->sim_price }}"
                                       required>
                                <p class="help is-danger " style="color:#FF0000" ;>{{ $errors->first('price') }}</p>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="inputFile">Choose file</label>
                                        <input type="file" name="images"
                                               class="custom-file-input @error('images') is-invalid @enderror"
                                               id="inputFile" value="{{$sim->sim_image}}">
                                    </div>
                                </div>
                                @error('images')
                                <p class="text-danger">{{ $errors->first('images') }}</p>
                                @enderror
                                <div class="mt-2">
                                    @if (!empty($sim->sim_image))
                                        <img class="w-25 img" src="{{$sim->sim_image}}" alt="">
                                    @endif
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
                            <div class="form-group col-12">
                                <label for="price">Tình Trạng :</label>
                                <select name="status" id="" required>
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <input type="hidden" name="locale" value="{{$sim->locale}}">
                            <div class="form-group col-12">
                                <label for="description">Mô tả :</label>
                                <textarea class="textarea" name="description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$sim->description}}</textarea>
                            </div>
                            <button type="submit" class="mb-5 btn btn-primary">Sửa</button>
                            <div><a href="{{ route('sim.index') }}" class="btn btn-danger">Hủy</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
