<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" ng-app="angularstrapApp">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ Theme::asset("css/bootstrap/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ Theme::asset("css/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ Theme::asset("css/owl.carousel/dist/assets/owl.carousel.min.css") }}"/>
    <link rel="stylesheet" href="{{ Theme::asset("css/lightslider/lightslider.min.css") }}"/>
    <link rel="stylesheet" href="{{ Theme::cssFile() }}">

</head>
<title>Simple Site Title | @yield('title')</title>
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="navbar-brand list-inline" >
                            <li>
                                <a href="?page=index" class="logo-box">
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
                        <li><a href="?page=info"  class="{{ ('info' == Request::get('page')) ? 'active' : '' }}">INFO FOR PATIENT</a></li>
                        <li><a href="?page=contact"  class="{{ ('contact' == Request::get('page')) ? 'active' : '' }}">Contact</a></li>
                        <li class="dropdown language-select">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">English <i
                                        class="fa fa-angle-down hidden-sm hidden-xs"></i></a>
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

    <div class="header-banner">
        <div class="slide-item"
             style="background: url({{ URL::to("/themes/{$folder}/images/banner.jpg") }}) no-repeat center center; height: 350px; background-size: cover;">
        </div>
    </div>
    <!--End Slide-->
</header>

<!--Begin Content-->
<div class="content">
   @yield('content')
</div>
<!--End Content-->

<!--Begin Footer-->
<footer class="bg-top-bottom">
    <div class="container">
        <p class="">Powered by Sanmax #afsprakenbeheer.</p>
    </div>
</footer>
<!--End Footer-->
</body>

<script type="text/javascript" src="{{ Theme::asset("js/plugin/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{ Theme::asset("js/plugin/lightslider.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/jquery.appear.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/owl.carousel.min.js") }}"></script>
<!-- Custom -->
<script type="text/javascript" src="{{ Theme::asset("js/main.js") }}"></script>

</html>
