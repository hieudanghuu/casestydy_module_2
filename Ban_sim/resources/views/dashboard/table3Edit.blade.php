@extends('BanSim.catalog.main')
@section('title','edit')

@section('main')

    <div class="hero-wrap hero-bread mt-5" style="background-image: url('{{asset('minishop/images/bg_6.jpg')}}');height: 380px" >

    </div>
    <div class="col-12 col-md-12 mt-5">
        <div class="row">
            <div class="col-12"><h1>製品を編集する</h1></div>
            <div class="col-12">
                <form  action="{{ route('dashboard.table3Update', $order->order_id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>名前</label>
                        <input type="text" class="form-control" name="user_name" value="{{$order->user_name}}" required>
                    </div>
                    <div class="form-group">
                        <label>製品名</label>
                        <input type="text" class="form-control" name="order_product" value="{{$order->order_product}}" required>
                    </div>
                    <div class="form-group">
                        <label>量</label>
                        <input type="number" class="form-control" name="quantity" value="{{$order->quantity}}" required>

                    </div>
                    <div class="form-group">
                        <label>価格</label>
                        <div class="col-2 input-group">
                      <input type="text" class="form-control" name="order_prices" value="{{$order->order_prices }}" required></div>
                    </div>
                    <div class="form-group">
                        <label>総額</label>
                        <div class="col-2 ">
                        <input type="text" class="form-control" name="totals" value="{{$order->totals}}" required>円</div>
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
                        <input type="number" class="form-control" name="status" value="{{$order->status}}" required>
                        <input type="hidden" class="form-control" name="user_id" value="{{$order->user_id}}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">アバター画像</label>
                        <img src="{{ 'data:image/jpeg;base64,'. $order->order_image }}" alt="image" style="max-width: 150px">
                        <input id="image" type="file" class="form-control" name="order_image" value="写真をインポートする" >
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">修正する</button>
                    <a href="{{ route('dashboard.table3')}}" role="button" class="btn btn-secondary">取り消す</a>
                </form>

            </div>
        </div>
    </div>
@endsection
