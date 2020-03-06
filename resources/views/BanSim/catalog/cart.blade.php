<!doctype html>
<html lang="en">
<head>

    @include('BanSim.catalog.partials.head')
</head>
<body>

<div class="py-1 bg-black">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+81 80-9436-7979</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">danghuuhieu08091989@gmail.com</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center">
                            <span class="icon-facebook"><a
                                    href="https://www.facebook.com/ctsconnecttosucceed/">acebook</a></span>
                        </div>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">7-45-3グリーンヒルハヶ崎304 Matsudo, Chiba</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">C.T.S 株式会社</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="dataSearch">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">
                        ホームページ</a></li>
                <li class="nav-item active"><a href="{{route('post')}}" class="nav-link">
                        ニュース</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">カタログ</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('shop')}}">店</a>
                        <a class="dropdown-item" href="{{route('cart')}}">カート</a>
                        <a class="dropdown-item" href="{{route('contact')}}">会社の詳細
                        </a>
                        @if(Cart::count() > 0)
                            <a class="dropdown-item" href="{{ route('checkout') }}">お支払い</a>
                        @endif
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('サインアップ') }}</a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->name === 'hieu')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">制御盤</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    {{ __('ログイン') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    {{ __('ログイン') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                @endguest
                <li class="nav-item cta cta-colored"><a href="{{route('cart')}}" class="nav-link"><span
                            class="icon-shopping-cart btn-warning " id="count1">[{{Cart::count()}}]</span></a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="hero-wrap hero-bread mt-5"
     style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 550px">
</div>

<section class="ftco-section ftco-cart mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                カートには <span class="text-danger" id="count">{{Cart::count()}}</span> つの商品があります
                <input type="hidden" value="{{Cart::count()}}" id="value1">
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
                    <input id="productsId" type='hidden' value={{json_encode($cartsId)}}>
                    @foreach(Cart::content() as $key => $cart)
                        <tr class="text-center">
                            <td class="product-remove"><a href="{{ route('destroy.cart', $cart->rowId) }}"><span
                                        class="ion-ios-close"></span></a>
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
                            <input type="hidden" value="{{ $cart->price }}" id="{{'price'.$cart->id}}">
                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="number" name="qty" id="{{'qty'.$cart->id}}"
                                           class="quantity form-control input-number"
                                           value="{{$cart->qty}}" min="1" max="100"
                                           onchange="myFunction(this.id); updateCart(this.id)">
                                    <p style="color: red; font-size: 12px" id="{{'qty_error' . $cart->id}}"></p>
                                    <input type="hidden" id="{{ 'rowId'.$cart->id }}" class="form-control"
                                           value="{{$cart->rowId}}">
                                </div>
                            </td>
                            <td class="total" id="{{'total'. $cart->id}}"> {{$cart->qty * $cart->price}}円</td>
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
                    <h3>合計</h3>
                    <p class="d-flex">
                        <span>総額</span>
                        <span id="total">{{ Cart::subtotal()}} 円</span>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">
                        お支払い</a></p>
            </div>
        </div>
    </div>
</section>
@include('BanSim.catalog.partials.footer')
@include('BanSim.catalog.partials.js')
<script>
    var formatNumber = (num) => {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
    };

    var myFunction = (rowId) => {
        id = rowId.slice(3);
        price = $('#price' + id).val();
        qty = parseInt($('#' + rowId).val());
        if (qty < 1 || isNaN(qty)) {
            $('#qty_error' + id).text('\n' +
                '0 より小さくすることはできません');
            $('#total' + id).text('0' + ' 円 ');
        } else {
            $('#qty_error' + id).text('');
            $('#total' + id).text(price * qty + ' 円');
        }
    }

    var updatePriceAndQty = () => {
        ids = JSON.parse($('#productsId').val());
        total_price = 0;
        total_qty = 0;
        $.each(ids, (key, value) => {
            total_price += parseInt($('#total' + value).text().slice(0, -1));
            total_qty += parseInt($('#qty' + value).val());
        });

        return {total_price, total_qty};
    }

    var updateCart = (rowId) => {

        id = rowId.slice(3);
        rowId_Product = $('#rowId' + id).val();
        array = updatePriceAndQty();

        $('#total').text(formatNumber(array['total_price']) + ' 円');
        $('.product-count').text(array['total_qty']);
        $('#count').text(array['total_qty']);
        $('#count1').text(array['total_qty']);


        return $.ajax({
            method: 'get',
            url: '/cart/update/' + id + '/' + qty + '/' + rowId_Product,
            contentType: 'application/json',
            dataType: 'json'
        });
    };
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });


</script>
</body>
</html>
