<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>{{ $title }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">
    <link rel="icon" href="{{ asset('template/images/fevicon.png" type="image/gif') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('template/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="{{ asset('template/images/logo.png') }}"
                                            alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    {{-- <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                                    </li> --}}
                                    <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('about') }}">About</a>
                                    </li>
                                    {{-- <li class="nav-item {{ request()->routeIs('testimoni') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('testimoni') }}">Testimonial</a>
                                    </li> --}}
                                    <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('login') }}"><i
                                                class="fa fa-user-circle padd_right"
                                                aria-hidden="true"></i>Login/Register</a>
                                    </li>
                                </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="contact">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="titlepage">
                            <h2>Kontak Kami</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="location_icon">
                            <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a> +62 813-8133-3356</li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>bataviapulogadung@gmail.com
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">

                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        <p>&copy; 2025 Sistem Booking Service Batavia Bintang Berlian Pulogadung.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
    @yield('javascript')
</body>

</html>
