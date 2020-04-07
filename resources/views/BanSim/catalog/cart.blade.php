@extends('BanSim.catalog.main')
@section('title','Cart')
@section('main')
<div class="hero-wrap hero-bread mt-5"
     style="background-image: url('{{asset('minishop/images/bg.png')}}');height: 550px">
</div>

<section class="ftco-section ftco-cart mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                {{trans('cart.cart1')}} <span class="text-danger" id="count">{{Cart::count()}}</span>  {{trans('cart.cart2')}}
                <input type="hidden" value="{{Cart::count()}}" id="value1">
                <table class="table">
                    <thead class="thead-primary">
                    <tr class="text-center">
                        <th></th>
                        <th></th>
                        <th> {{trans('cart.name')}}</th>
                        <th> {{trans('cart.price')}}</th>
                        <th> {{trans('cart.sl')}}</th>
                        <th> {{trans('cart.total')}}</th>
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
                                    <img src="{{ $image }}" alt="sim_image"
                                         style="max-width: 150px">
                                @endforeach
                            </td>
                            <td class="product-name">
                                <h3> {{trans('cart.title')}}</h3>
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
                    <h3> {{trans('cart.tong')}}</h3>
                    <p class="d-flex">
                        <span> {{trans('cart.total')}}</span>
                        <span id="total">{{ Cart::subtotal()}} 円</span>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">
                        {{trans('cart.thanhtoan')}}</a></p>
            </div>
        </div>
    </div>
</section>

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
@endsection

