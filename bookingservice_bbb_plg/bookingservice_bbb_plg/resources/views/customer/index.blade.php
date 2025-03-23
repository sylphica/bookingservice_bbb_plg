@extends('layouts.customer')
@section('css')
@endsection

@section('content')
    <section class="banner_main">
        <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#banner1" data-slide-to="0" class="active"></li>
                <li data-target="#banner1" data-slide-to="1"></li>
                <li data-target="#banner1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-bg">
                                    <h1>Selamat Datang di Batavia Bintang Berlian</h1>
                                        <span>Dealer Resmi Mitsubishi Terpercaya Anda</span>
                                        <p>Pilih Dealer Visit atau Home Service, dan biarkan Mekanik ahli kami merawat kendaraan Anda.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text_img">
                                        <figure><img src="{{ asset('template/images/mekanikmitsubishi.jpg') }}" alt="#" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-bg">
                                    <h1>Selamat Datang di Batavia Bintang Berlian</h1>
                                        <span>Dealer Resmi Mitsubishi Terpercaya Anda</span>
                                        <p>Layanan Booking Service memastikan kendaraan Anda servis tepat waktu dan tanpa antrian.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text_img">
                                        <figure><img src="{{ asset('template/images/mitsubishimekanik2.jpg') }}" alt="#" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-bg">
                                    <h1>Selamat Datang di Batavia Bintang Berlian</h1>
                                        <span>Dealer Resmi Mitsubishi Terpercaya Anda</span>
                                        <p>Layanan service juga tersedia di hari Sabtu. Silahkan hubungi dealer untuk mendapatkan informasi lebih lanjut.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text_img">
                                        <figure><img src="{{ asset('template/images/mitsubishimekanik3.jpg') }}" alt="#" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
