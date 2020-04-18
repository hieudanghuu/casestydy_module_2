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
    <h1 class="text-center btn-danger mt-5">{{trans('checkout.thutuc')}}</h1>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">

                    @if (Cart::content() === [])
                        <h1>{{trans('checkout.rong')}}</h1>
                    @else
                        <form action="{{ route("checkout.save") }}" class="billing-form" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <h1 class="mb-4 billing-heading text-center"><strong>{{trans('checkout.thongtin')}}</strong>
                            </h1>
                            <div class="row align-items-end">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="firstname">{{trans('checkout.name')}}</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{Auth::user()->name}}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">
                                            {{trans('checkout.avatar')}}</label>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFile"><strong>Ảnh</strong></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="inputFile">File ảnh</label>
                                                    <input type="file" name="image"
                                                           class="custom-file-input @error('images') is-invalid @enderror"
                                                           id="inputFile"
                                                           value="{{asset('minishop/images/avatar.png')}}" alt="image">
                                                </div>
                                            </div>
                                            @error('images')
                                            <p class="text-danger">{{ $errors->first('images') }}</p>
                                            @enderror
                                            <div class="mt-2">
                                                <img class="w-25 img" src="{{asset('minishop/images/avatar.png')}}"
                                                     alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">{{trans('checkout.address')}}</label>
                                        <input type="text" class="form-control" name="address"
                                               value="{{Auth::user()->address}}">
                                            @error('address')
                                            <p class="text-danger">{{ $errors->first('address') }}</p>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="streetaddress">{{trans('checkout.phone')}}</label>
                                        <input type="text" class="form-control" name="phone"
                                               value="{{Auth::user()->phone}}">
                                               @error('phone')
                                               <p class="text-danger">{{ $errors->first('phone') }}</p>
                                               @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="streetaddress">{{trans('checkout.ghichu')}}</label>
                                        <textarea name="note" id="" cols="30" rows="5" class="form-control"
                                                  placeholder="{{trans('checkout.messi')}}"></textarea>
                                    </div>
                                </div>

                                <section class="ftco-section ftco-cart ">
                                    <div class="container">
                                        <h1 class="mb-4 billing-heading mt-5 text-center col-md-12">
                                            {{trans('checkout.dathang')}} </h1>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                {{trans('cart.cart1')}} <span
                                                    class="text-danger">{{Cart::count()}}</span> {{trans('cart.cart2')}}
                                                <table class="table">
                                                    <thead class="thead-primary">
                                                    <tr class="text-center">
                                                        <th></th>
                                                        <th></th>
                                                        <th>{{trans('cart.name')}}</th>
                                                        <th>{{trans('cart.price')}}</th>
                                                        <th>{{trans('cart.sl')}}</th>
                                                        <th>{{trans('cart.total')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(Cart::content() as $key => $cart)
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td class="image-prod">
                                                                @foreach($cart->options as $image)
                                                                    <img src="{{ $image }}"
                                                                         alt="sim_image"
                                                                         style="max-width: 150px">
                                                                    <input type="hidden" value="{{$image}}"
                                                                           name="image_product">
                                                                @endforeach
                                                            </td>
                                                            <td class="product-name">
                                                                <h3>{{trans('cart.title')}}</h3>
                                                                <p>{{ $cart->name }}</p>
                                                                <input type="hidden" name="product"
                                                                       value="{{$cart->name}}">
                                                            </td>
                                                            <td class="price">{{ $cart->price }} 円</td>
                                                            <input type="hidden" name="price" value="{{$cart->price}}">
                                                            <input type="hidden" name="sim_id" value="{{$cart->id}}">
                                                            <input type="hidden" value="{{ $cart->rowId }}"
                                                                   name="rowId">
                                                            <td class="quantity">
                                                                <div class="input-group mb-3">
                                                                    <input type="number" name="qty"
                                                                           class="form-control "
                                                                           value="{{$cart->qty}}">
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
                                        <h3 class="billing-heading mb-4">{{trans('checkout.cartTotal')}}</h3>
                                        <p class="d-flex">
                                            <span>{{trans('cart.total')}}</span>
                                            <span>{{ Cart::subtotal() }} 円</span>
                                        </p>
                                        <p class="d-flex">
                                            <span>{{trans('checkout.vanchuyen')}}</span>
                                            <span>0.00 円</span>
                                        </p>
                                        <p class="d-flex">
                                            <span>{{trans('checkout.thue')}}</span>
                                            <span>{{ Cart::tax() }} 円</span>
                                        </p>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>{{trans('checkout.tong')}}</span>
                                            <span>{{ Cart::total() }} 円</span>
                                            <input type="hidden" name="total" value="{{ Cart::total() }}">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-detail bg-light p-3 p-md-4">
                                        <h3 class="billing-heading mb-4">{{trans('checkout.cachthuc')}} </h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" name="optradio" class="mr-2"
                                                                  value="1">{{trans('checkout.chuyenkhoan')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" name="optradio" class="mr-2" value="2"
                                                                  checked>{{trans('checkout.ok')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="" class="mr-2" required>
                                                        {{trans('checkout.ok1')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <button type="submit" class="btn btn-primary py-3 px-4"
                                                    onclick=" return confirm('\n'+
                                                        '{{trans('checkout.messi1')}}')"><a
                                                    href="{{route('destroy.cart',$cart->rowId)}}"></a>{{trans('checkout.ok2')}}
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
