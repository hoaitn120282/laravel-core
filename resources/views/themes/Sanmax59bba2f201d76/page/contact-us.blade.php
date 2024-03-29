
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="{{ Theme::asset("css/bootstrap/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ Theme::asset("css/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{Theme::asset("css/owl.carousel/dist/assets/owl.carousel.min.css") }}" />
    <link rel="stylesheet" href="{{ Theme::cssFile() }}">

</head>
<title>{{ Helper::option("site_title") }} | @yield('appTitle')</title>
<body>

<!-- Header -->
@include(Theme::active().'.components.header')
<!-- /.Header -->

<div class="content content-contact">
    <div class="container">
        <section class="contact bg-white">
            <header>
                <h1>{{ $model->post_title }}</h1>
                <p>{!!html_entity_decode($model->post_content)!!}</p>
            </header>
            <div class="contact-info">
            @if(Widget::existsGroup('top_content'))
                <div class="row">
                {{ Widget::group('top_content') }}
                </div>
            @endif
            </div>
        </section>
        <!--End New Detail-->
    </div>

    @if(Widget::existsGroup('bottom_content'))
        {{ Widget::group('bottom_content') }}
    @endif

</div>

<!--Begin Footer-->
@include(Theme::active().'.components.footer')
<!--End Footer-->

</body>

<script type="text/javascript" src="{{ Theme::asset("js/plugin/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/jquery.appear.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/plugin/owl.carousel.min.js") }}"></script>
<script type="text/javascript" src="{{ Theme::asset("js/main.js") }}"></script>

@stack('scripts')
</html>

@section('appTitle')
    {{ $appTitle or $model->post_title }}
@endsection
