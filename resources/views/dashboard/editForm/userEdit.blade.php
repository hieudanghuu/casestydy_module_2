@extends('dashboard.partials.main')
@section('title','Edit')
@section('content')
    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="col-12 col-md-12 mt-5">
                                <div class="row">
                                   <h1  >Chỉnh sửa User</h1>
                                    <br>
                                    <div class="col-12 mt-5">
                                        <form method="post" action="{{ route('user.update',$user->id) }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group row">
                                                <div class="form-group col-12">
                                                    <label for="name">Tên User</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{ $user->name }}" required>
                                                    <p class="help is-danger" style="color:#FF0000"
                                                       ;>{{ $errors->first('name') }}</p>

                                                </div>
                                                <div class="form-group  col-12">
                                                    <label for="price">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{ $user->email }}" required>
                                                    <p class="help is-danger " style="color:#FF0000"
                                                       ;>{{ $errors->first('price') }}</p>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="exampleInputFile">Avatar</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="inputFile">Choose
                                                                file</label>
                                                            <input type="file" name="images"
                                                                   class="custom-file-input @error('images') is-invalid @enderror"
                                                                   id="inputFile" value="{{$user->avatar}}">
                                                        </div>
                                                    </div>
                                                    @error('images')
                                                    <p class="text-danger">{{ $errors->first('images') }}</p>
                                                    @enderror
                                                    <div class="mt-2">
                                                        @if (!empty($user->avatar))
                                                            <img class="w-25 img" src="{{$user->avatar}}" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sim_category_id">Địa chỉ :</label>
                                                    <input type="text" class="form-control" name="address"
                                                           value="{{ $user->address }}" required>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sim_category_id">Phone :</label>
                                                    <input type="text" class="form-control" name="phone"
                                                           value="{{ $user->phone }}" required>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sim_category_id">password :</label>
                                                    <input type="password" class="form-control" name="password"
                                                           value="******" required>
                                                    <input type="hidden" class="form-control" name="password1"
                                                           value="{{$user->password}}" >
                                                </div>
                                                <button type="submit" class="mb-5 btn btn-primary">Sửa</button>
                                                <div><a href="{{ route('user.index') }}" class="btn btn-danger">Hủy</a>
                                                </div>
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
