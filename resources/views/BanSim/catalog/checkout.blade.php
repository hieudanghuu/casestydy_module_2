@extends('BanSim.catalog.main')
@section('title','checkout')
@section('main')

    <script>
        function selectFile() {
            document.getElementById('buttonFile').click()
        }
    </script>
    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 550px">
    </div>
    <h1 class="text-center btn-danger mt-5">お支払い手順</h1>
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
                            <h1 class="mb-4 billing-heading text-center"><strong>顧客情報</strong></h1>
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
                                        <label for="country">
                                            アバター</label>
                                        <img src="{{asset('minishop/images/avatar.png')}}" alt="image"
                                             style="max-width: 150px">
                                        <input id="buttonFile" hidden type="file" class="form-control" name="image">
                                        <button class="btn btn-warning" onclick="selectFile()" type="button">
                                            写真を選ぶ
                                        </button>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="streetaddress">ノート</label>
                                        <textarea name="note" id="" cols="30" rows="5" class="form-control"
                                                  placeholder="メッセージを残しますか？"></textarea>
                                    </div>
                                </div>

                                <section class="ftco-section ftco-cart ">
                                    <div class="container">
                                        <h1 class="mb-4 billing-heading mt-5 text-center col-md-12">
                                            注文した製品 </h1>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                カートには <span class="text-danger">{{Cart::count()}}</span> つの商品があります
                                                <table class="table">
                                                    <thead class="thead-primary">
                                                    <tr class="text-center">
                                                        <th></th>
                                                        <th></th>
                                                        <th>製品</th>
                                                        <th>価格</th>
                                                        <th>量</th>
                                                        <th>総額</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(Cart::content() as $key => $cart)
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td class="image-prod">
                                                                @foreach($cart->options as $image)
                                                                    <img src="{{ 'data:image/jpeg;base64,'.$image }}"
                                                                         alt="sim_image"
                                                                         style="max-width: 150px">
                                                                    <input type="hidden" value="{{$image}}"
                                                                           name="image_product">
                                                                @endforeach
                                                            </td>
                                                            <td class="product-name">
                                                                <h3>新しいシム2020</h3>
                                                                <p>{{ $cart->name }}</p>
                                                                <input type="hidden" name="product" value="{{$cart->name}}">
                                                            </td>
                                                            <td class="price">{{ $cart->price }} 円</td>
                                                            <input type="hidden" name="price" value="{{$cart->price}}">
                                                            <input type="hidden" name="sim_id" value="{{$cart->id}}">
                                                            <input type="hidden" value="{{ $cart->rowId }}" name="rowId">
                                                            <td class="quantity">
                                                                <div class="input-group mb-3">
                                                                    <input type="number" name="qty"
                                                                           class="form-control "
                                                                           value="{{$cart->qty}}" min="1" max="100">
                                                                </div>
                                                            </td>
                                                            <td class="total"> {{ $cart->price * $cart->qty}} 円</td>
                                                        </tr>
                                                        <!-- END TR-->
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
                                            <button type="submit" class="btn btn-primary py-3 px-4" onclick=" return confirm('\n'+
'注文が成功すると、3〜5日で商品を受け取ります' )"><a
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
