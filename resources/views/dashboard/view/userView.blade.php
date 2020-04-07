@extends('dashboard.partials.main')
@section('title','show')
@section('content')
<div class="page-wrapper">
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__">
                <div class="container-fluid">
                    <section class="content">
                        <div class="container">
                            <a class="btn btn-dark" href="{{route('dashboard.users')}}">Back</a>
                            <div class="card card-solid mt-5">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-3">
                                            <h3 class="d-inline-block d-sm-none"></h3>
                                            <div class="col-12">
                                                <img src="{{ $user->avatar }}" class="product-image"
                                                     alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <h3 class="my-3"> {{$user->name}}</h3>
                                            <div>
                                                <p> Email : <strong>  {{$user->email}}</strong></p>
                                                <p> Địa chỉ : <strong>{{$user->address}}</strong></p>
                                                <p> phone : <strong>{{$user->phone}}</strong></p>
                                                <p> thời gian tạo  : <strong>{{$user->created_at}}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

