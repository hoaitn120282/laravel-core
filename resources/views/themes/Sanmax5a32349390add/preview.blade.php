<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="{{URL::to("/themes/{$folder}")}}/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::to("/themes/{$folder}")}}/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::to("/themes/{$folder}")}}/css/owl.carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset($css_path) }}">
</head>
<title>Medium Site Title | @yield('title')</title>
<body>
    <a href="#" id="back-to-top" title="Back to top">
        <i class="fa fa-angle-up"></i>
    </a>
    <header class="header">
        <div class="header-contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="address-ct"><i class="fa fa-map-marker"></i>000 Fake Street, Fake City, Fake Country</p>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-contact list-inline pull-right">
                            <li><i class="fa fa-phone"></i>+1 420-000-000</li>
                            <li><i class="fa fa-envelope"></i>contact@indochinatravel.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Begin Navbar-->
        <nav class="navbar">
            <div class="container">
                <div>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <ul class="navbar-brand list-inline" >
                            <li>
                                <a href="?page=index">
                                    <img class="logo" src="{{URL::to("/themes/{$folder}")}}/images/logo.png" alt="">
                                </a>
                            </li>
                            <li class="sologan">
                                <a href="?page=index">
                                    <p class="site-title">Site Title</p>
                                    <p>Sample Slogan</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right nav-right-custom text-right">
                            <li><a href="?page=index" class="{{ ('index' == Request::get('page', 'index')) ? 'active' : '' }}">Home</a></li>
                            <li><a href="?page=team" class="{{ ('team' == Request::get('page')) ? 'active' : '' }}">Team</a></li>
                            <li><a href="?page=news" class="{{ ('news' == Request::get('page')) ? 'active' : '' }}">News</a></li>
                            <li><a href="?page=contact" class="{{ ('contact' == Request::get('page')) ? 'active' : '' }}">Contact</a></li>
                            <li><a href="?page=more" class="{{ ('more' == Request::get('page')) ? 'active' : '' }}">More</a></li>
                            <li class="dropdown language-select">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">English <i class="fa fa-angle-down hidden-sm hidden-xs"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Dutch</a>
                                    </li>
                                    <li>
                                        <a href="#">German</a>

                                    </li>
                                    <li>
                                        <a href="#">French</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>
        </nav>
        <!--End Navbar-->

        @if('index' == Request::get('page', 'index'))
        <div class="header-slide owl-carousel owl-theme">
            <div class="slide-item">
                <figure>
                    <img src="{{ URL::to("/themes/{$folder}/images/banner.jpg") }}" alt="">
                </figure>
                <div class="make-appointment text-center">
                    <h1 class="header-title">Sed ut perspiciatis unde omnis</h1>
                    <p class="header-sologan">Voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                </div>
            </div>

            <div class="slide-item">
                <figure>
                    <img src="{{ URL::to("/themes/{$folder}/images/banner.jpg") }}" alt="">
                </figure>
                <div class="make-appointment text-center">
                    <h1 class="header-title">Sed ut perspiciatis unde omnis</h1>
                    <p class="header-sologan">Voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                </div>
            </div>

            <div class="slide-item">
                <figure>
                    <img src="{{ URL::to("/themes/{$folder}/images/banner.jpg") }}" alt="">
                </figure>
                <div class="make-appointment text-center">
                    <h1 class="header-title">Sed ut perspiciatis unde omnis</h1>
                    <p class="header-sologan">Voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                </div>
            </div>
        </div>
        @else
        <div class="page-banner" >
                <h1 class="page-title text-center">@yield('title')</h1>
        </div>
        @endif
        <!--End Slide-->
    </header>

    <!--Begin Content-->
    <div class="content">
        <aside class="sidebar-left"></aside>
        
        @yield('content')
        
        <!--Begin Sidebar Right-->
        <aside class="sidebar-right">
            
        </aside>
        <!--Begin Sidebar Right-->
    </div>
    <!--End Video-->

    <!--Begin Footer-->
    <footer class="bg-top-bottom">
        <div class="container">
            <p class="">Powered by Sanmax #afsprakenbeheer.</p>
        </div>
    </footer>
    <!--End Footer-->
</body>

<script type="text/javascript" src="{{ URL::to("/themes/{$folder}/js/plugin/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::to("/themes/{$folder}/js/plugin/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::to("/themes/{$folder}/js/plugin/jquery.appear.js") }}"></script>
<script type="text/javascript" src="{{ URL::to("/themes/{$folder}/js/plugin/owl.carousel.min.js") }}"></script>

<script type="text/javascript" src="{{ URL::to("/themes/{$folder}/js/main.js") }}"></script>
@stack('scripts')
</html>
