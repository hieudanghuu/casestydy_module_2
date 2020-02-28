@extends('BanSim.catalog.main')
@section('title','cart')
@section('main')

    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 380px">
    </div>

    <section class="ftco-section ftco-cart mt-5">
        <div class="container">
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
                                <td class="product-remove"><a href="{{ route('destroy.cart', $cart->rowId) }}"><span class="ion-ios-close"></span></a>
                                </td>
                                <td class="image-prod">

                                    @foreach($cart->options as $image)
                                        <img src="{{ 'data:image/jpeg;base64,'.$image }}" alt="sim_image"
                                             style="max-width: 150px">
                                    @endforeach
                                </td>
                                <td class="product-name">
                                    <h3>新しいシム2020</h3>
                                    <p>{{ $cart->name }}</p>
                                </td>
                                <td class="price">{{ $cart->price }} 円</td>
                                <form action="{{route('cart.update', $cart->price)}}" method="post">
                                    @csrf
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="qty"
                                               class="quantity form-control input-number"
                                               value="{{$cart->qty}}" min="1" max="100">
                                        <input type="hidden" name="rowId_cart" class="form-control" value="{{$cart->rowId}}">
                                        <input type="submit" value="修正する" name="update_qty" class=" btn btn-default btn-sm bg-warning">
                                    </div>
                                </td>
                                <td class="total"> {{ $cart->price * $cart->qty}} 円</td>
                                </form>
                            </tr>
                            <!-- END TR-->

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
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
                        </p>
                    </div>

                    <p class="text-center"><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>

                </div>
            </div>
        </div>
    </section>
@endsection
