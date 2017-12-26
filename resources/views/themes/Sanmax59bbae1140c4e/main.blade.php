<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>{{ Helper::option("site_title") }} | @yield('appTitle')</title>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ Theme::asset("css/bootstrap/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ Theme::asset("css/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ Theme::asset("css/owl.carousel/dist/assets/owl.carousel.min.css") }}"/>
    <link rel="stylesheet" href="{{ Theme::asset("css/lightslider/lightslider.min.css") }}"/>
    <link rel="stylesheet" href="{{ Theme::cssFile() }}">
</head>
<body>

@include(Theme::active().'.components.header')
@include(Theme::active().".layouts.{$layout}")
@include(Theme::active().'.components.footer')

</body>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/lightslider.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/jquery.appear.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/owl.carousel.min.js") }}"></script>
<!-- Custom -->
<script type="text/javascript" src="{{ Theme::asset("js/main.js") }}"></script>

</html>
