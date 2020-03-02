@extends('BanSim.catalog.main')
@section('title', 'contact')
@section('main')
    <div class="hero-wrap hero-bread mt-5"
         style="background-image: url('{{ asset('minishop/images/bg.png') }}') ;height: 550px">
    </div>

    <section class="ftco-section contact-section bg-light mt-5">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>住所:</span> 7-45-3グリーンヒルハヶ崎304 Matsudo, Chiba</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>電話:</span> <a href="tel://1234567920">+81 80-9436-7979</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <span>メール:</span> <a href="mailto:info@yoursite.com">hieu@123.com</a>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>ウェブサイト</span> <a href="#">cts.com</a></p>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <a>
                        <img src="{{asset('minishop/images/logocts.png')}}" height="500px" alt="">
                        <p>
                            インターネットサービス、日本でのベトナム人向けの職業紹介を提供します。 低価格と品質をモットーに、C.T.Sブランドを他の日本企業と同等のレベルに引き上げます。
                            当社では、迅速なサービス、熱心なアドバイスを選択し、可能な限り最も手頃な価格で必要なサービスを見つけることができます。
                            あなたの喜びは私たちの幸せです。
                        </p>
                    </a>

                </div>


                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-gallery ftco-section ftco-no-pb">

        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="{{ asset('minishop/images/anhdep1.jpg') }}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{ asset('minishop/images/anhdep1.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="{{ asset('minishop/images/anhdep2.jpg') }}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{ asset('minishop/images/anhdep2.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="{{ asset('minishop/images/anhdep3.jpg') }}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{ asset('minishop/images/anhdep3.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="{{ asset('minishop/images/anhdep4.jpg') }}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{ asset('minishop/images/anhdep4.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="{{ asset('minishop/images/anhdep5.jpg') }}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{ asset('minishop/images/anhdep5.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="{{ asset('minishop/images/anhdep6.jpg') }}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{ asset('minishop/images/anhdep6.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00"/>
        </svg>
    </div>
@endsection

