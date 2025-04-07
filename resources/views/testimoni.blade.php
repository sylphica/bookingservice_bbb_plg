@extends('layouts.index')
@section('css')
@endsection

@section('content')
    <div class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Testimonial</h2>
                        <p>It is a long established fact that a reader will be distracted by the </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="carousel-caption ">
                                        <div class="row">
                                            <div class="col-md-6 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="{{ asset('template/images/tes.jpg') }}"
                                                            alt="#" /></i>
                                                    <h4>JCKOLO</h4>
                                                    <span>(It is a long )</span>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters, as </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="{{ asset('template/images/tes1.jpg') }}"
                                                            alt="#" /></i>
                                                    <h4>ROCOYO</h4>
                                                    <span>(It is a long )</span>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters, as </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-md-6 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="{{ asset('template/images/tes.jpg') }}"
                                                            alt="#" /></i>
                                                    <h4>JCKOLO</h4>
                                                    <span>(It is a long )</span>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters, as </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="{{ asset('template/images/tes1.jpg') }}"
                                                            alt="#" /></i>
                                                    <h4>ROCOYO</h4>
                                                    <span>(It is a long )</span>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters, as </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-md-6 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="{{ asset('template/images/tes.jpg') }}"
                                                            alt="#" /></i>
                                                    <h4>JCKOLO</h4>
                                                    <span>(It is a long )</span>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters, as </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="{{ asset('template/images/tes1.jpg') }}"
                                                            alt="#" /></i>
                                                    <h4>ROCOYO</h4>
                                                    <span>(It is a long )</span>
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout. The point of
                                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                                        of letters, as </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
