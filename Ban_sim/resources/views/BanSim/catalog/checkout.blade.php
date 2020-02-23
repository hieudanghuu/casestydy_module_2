@extends('BanSim.catalog.main')
@section('title','checkout')
@section('main')

    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 380px">
    </div>
    <h1 class="text-center btn-primary mt-5">お支払い手順</h1>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">

                    @if (Cart::content() === [])
                        <h1>データがありません</h1>
                    @else
                        <form action="{{ route("checkout.save") }}" class="billing-form" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <h1 class="mb-4 billing-heading "><strong>顧客</strong></h1>
                            <div class="row align-items-end">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="firstname">名前</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{Auth::user()->name}}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">住所</label>
                                        <img src="{{asset('minishop/images/avatar.png')}}" alt="image"
                                             style="max-width: 150px">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">住所</label>
                                        <input type="text" class="form-control" name="address"
                                               value="{{Auth::user()->address}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="streetaddress">電話</label>
                                        <input type="text" class="form-control" name="phone"
                                               value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <h1 class="mb-4 billing-heading mt-5">製品 </h1>
                                @foreach(Cart::content() as $key=> $cart)

                                    <div class="row align-items-end mt-5">
                                        <div class="col-md-9">
                                            <div class="form-group">

                                                <label for="image">画像</label>
                                                @foreach($cart->options as $image)
                                                    <img src="{{ 'data:image/jpeg;base64,'. $image }}" alt="image"
                                                         style="max-width: 150px">
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="streetaddress">製品名</label>
                                                <input type="text" class="form-control"
                                                       placeholder="" value="{{$cart->name}}" name="product_name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="streetaddress">量</label>
                                                <input type="text" class="form-control"
                                                       placeholder="" value="{{$cart->qty}}" name="qty">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="streetaddress">価格</label>
                                                <input type="number" class="form-control"
                                                       placeholder="" value="{{ $cart->price }}" name="price">
                                                <input type="hidden"
                                                        value="{{ $cart->id }}" name="id">
                                                <input type="hidden"
                                                        value="{{ $cart->rowId }}" name="rowId">
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-12">
                                            <div class="form-group mt-4">
                                                <div class="radio">
                                                    <label class="mr-3"><input type="radio" name="optradio"> Create an
                                                        Account?</label>
                                                    <label><input type="radio" name="optradio"> Ship to different
                                                        address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary py-3 px-4">注文する</button>
                                @endforeach
                            </div>
                            <!-- END -->
                            <div class="row mt-5 pt-3 d-flex">
                                <div class="col-md-6 d-flex">
                                    <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                        <h3 class="billing-heading mb-4">Cart Total</h3>
                                        <p class="d-flex">
                                            <span>総額</span>
                                            <span>{{ Cart::subtotal() }} 円</span>
                                        </p>
                                        <p class="d-flex">
                                            <span>送料</span>
                                            <span>0.00 円</span>
                                        </p>
                                        <p class="d-flex">
                                            <span>税金</span>
                                            <span>{{ Cart::tax() }} 円</span>
                                        </p>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>合計支払い</span>
                                            <span>{{ Cart::total() }} 円</span>
                                            <input type="hidden" name="total" value="{{ Cart::total() }}">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-detail bg-light p-3 p-md-4">
                                        <h3 class="billing-heading mb-4">支払方法 </h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" name="optradio" class="mr-2" value="1">銀行振込</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" name="optradio" class="mr-2" value="2"
                                                                  checked>支払いを確認する</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="" class="mr-2" required>
                                                        利用規約を読み、同意します</label>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <button type="submit" class="btn btn-primary py-3 px-4"><a
                                                    href="{{route('destroy.cart',$cart->rowId)}}"></a>注文する
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00"/>
        </svg>
    </div>
@endsection
