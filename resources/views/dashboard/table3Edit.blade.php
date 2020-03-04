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
                <div class="col-12"><h1>製品を編集する</h1></div>
                <div class="col-12">
                    <form action="{{ route('dashboard.table3Update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>名前</label>
                            <input type="text" class="form-control" name="user_name" value="{{$order->user_name}}"
                                   required>
                            <input type="hidden" class="form-control" name="order_id" value="{{$order->order_id}}"
                                   required>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>製品名</label>--}}
                        {{--                            <input type="text" class="form-control" name="order_product"--}}
                        {{--                                   value="{{$product_order->product}}" required>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>量</label>--}}
                        {{--                            <input type="number" class="form-control" name="quantity"--}}
                        {{--                                   value="{{$product_order->quantity}}" required>--}}

                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>価格</label>--}}
                        {{--                            <div class="col-2 input-group">--}}
                        {{--                                <input type="text" class="form-control" name="order_prices"--}}
                        {{--                                       value="{{$product_order->prices }}" required></div>--}}
                        {{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>総額</label>--}}
{{--                            <div class="col-2 ">--}}
{{--                                <input type="text" class="form-control" name="totals" value="{{$order->totals}}"--}}
{{--                                       required>円--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>ノート</label>
                            <div class="col-2 ">
                                <input type="text" class="form-control" name="totals" value="{{$order->note}}"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>電話</label>
                            <input type="text" class="form-control" name="phone" value="{{$order->phone}}" required>
                        </div>
                        <div class="form-group">
                            <label>住所</label>
                            <input type="text" class="form-control" name="address" value="{{$order->address}}" required>
                        </div>
                        <div class="form-group">
                            <label>状態</label>
                            <select name="status" id="">
                                <option value="1">未確認</option>
                                <option value="0">確認しました</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">アバター画像</label>
                            <img src="{{ 'data:image/jpeg;base64,'. $order->order_image }}" alt="image"
                                 style="max-width: 150px">
                            <input id="buttonFile" hidden type="file" class="form-control" name="order_image">
                            <button class="btn btn-warning" onclick="selectFile()" type="button"> 写真
                            </button>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror

                        </div>
                        <section class="ftco-section ftco-cart ">
                            <div class="container">
                                <h1 class="mb-4 billing-heading mt-5 text-center col-md-12">
                                    注文した製品 </h1>
                                <div class="row">
                                    <div class="col-md-12 ftco-animate">
                                        <table class="table">
                                            <thead class="thead-primary">
                                            <tr class="text-center">
                                                <th></th>

                                                <th>製品</th>
                                                <th>価格</th>
                                                <th>量</th>
                                                <th>総額</th>
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
                                                        <h3>新しいシム2020</h3>
                                                        <p><input type="text" name="product" value="{{ $product_order->product }}"></p>
                                                    </td>
                                                    <td class="price">
                                                    <input type="text" name="price" value="{{$product_order->prices }}">円</td>

                                                    <td class="quantity">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="quantity"
                                                                   class="quantity form-control input-number"
                                                                   value="{{$product_order->quantity}}" min="1" max="100">
                                                        </div>
                                                    </td>
                                                    <td class="total">  {{$product_order->quantity * $product_order->prices }}  円</td>
                                                </tr>
                                                <!-- END TR-->
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <button type="submit" class="btn btn-primary">修正する</button>
                        <a href="{{ route('dashboard.table3')}}" role="button" class="btn btn-secondary">取り消す</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
