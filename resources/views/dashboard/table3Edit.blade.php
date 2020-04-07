@extends('BanSim.catalog.main')
@section('title','edit')

@section('main')

    <script>
        function selectFile() {
            document.getElementById('buttonFile').click()
        }
    </script>
    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{asset('minishop/images/bg_6.jpg')}}');height: 380px">
    </div>
    <div class="container">
        <div class="col-12 col-md-12 mt-5">
            <div class="row">
                <div class="col-12"><h1>Chỉnh sửa sản phẩm</h1></div>
                <div class="col-12">
                    <form action="{{ route('dashboard.table3Update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Tên Sim </label>
                            <input type="text" class="form-control" name="user_name" value="{{$order->user_name}}"
                                   required>
                            <input type="hidden" class="form-control" name="order_id" value="{{$order->order_id}}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="textarea" name="note" placeholder="Nhập nội dung"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$order->note}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <strong> <input type="text" class="form-group col-2" name="totals" value="{{$order->totals}} " required>
                                円</strong>
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{$order->phone}}" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{$order->address}}" required>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="">
                                <option value="1">Chưa Duyệt</option>
                                <option value="0">Đã Duyệt</option>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="exampleInputFile"><strong>Ảnh</strong></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="inputFile">File ảnh</label>
                                    <input type="file" name="order_image"
                                           class="custom-file-input @error('images') is-invalid @enderror"
                                           id="inputFile" value="{{ 'data:image/jpeg;base64,'. $order->order_image }}" alt="image">
                                </div>
                            </div>
                            @error('images')
                            <p class="text-danger">{{ $errors->first('images') }}</p>
                            @enderror
                            <div class="mt-2">
                                    <img class="w-25 img" src="{{ 'data:image/jpeg;base64,'. $order->order_image }}" alt="image">

                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{$order->user_id}}">
                        <section class="ftco-section ftco-cart ">
                            <div class="container">
                                <h1 class="mb-4 billing-heading mt-5 text-center col-md-12">
                                    Sản phẩm đặt hàng </h1>
                                <div class="row">
                                    <div class="col-md-12 ftco-animate">
                                        <table class="table">
                                            <thead class="thead-primary">
                                            <tr class="text-center">
                                                <th></th>
                                                <th>Tên Sim</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product_order1 as $product_order)
                                                <tr class="text-center">
                                                    <td>
                                                        <img src="{{ 'data:image/jpeg;base64,'.$product_order->image }}"
                                                             alt="sim_image"
                                                             style="max-width: 150px">
                                                        <input type="hidden" value="{{$product_order->image}}"
                                                               name="image_product">
                                                    </td>
                                                    <td class="product-name">
                                                        <p><input type="text" name="product"
                                                                  value="{{ $product_order->product }}"></p>
                                                    </td>
                                                    <td class="price">
                                                        <input type="text" name="price"
                                                               value="{{$product_order->prices }}">円
                                                    </td>

                                                    <td class="quantity">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="quantity"
                                                                   class="quantity form-control input-number"
                                                                   value="{{$product_order->quantity}}" min="1"
                                                                   max="100">
                                                        </div>
                                                    </td>
                                                    <td class="total">  {{$product_order->quantity * $product_order->prices }}
                                                        円
                                                    </td>
                                                </tr>
                                                <!-- END TR-->
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <a href="{{ route('dashboard.table3')}}" role="button" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
            @include('dashboard.partials.footer')
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
