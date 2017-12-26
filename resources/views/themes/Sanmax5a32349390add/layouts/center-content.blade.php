<?php

$main_class = (Widget::existsGroup('left_sidebar') && Widget::existsGroup('right_sidebar')) ?
        'col-md-6 col-sm-12' :
        (Widget::existsGroup('left_sidebar') || Widget::existsGroup('right_sidebar') ? 'col-md-9 col-sm-12' : 'col-md-12 col-sm-12');
?>

<div class="container">
    <div class="row">
        @if(Widget::existsGroup('left_sidebar'))
        @section('left-sidebar')
            <div class="col-md-3 col-sm-12">
                <aside class="sidebar-right">
                    {{ Widget::group('left_sidebar') }}
                </aside>
            </div>
        @show
        @endif

        <div class="{{ $main_class }}">@yield('content')</div>

        @if(Widget::existsGroup('right_sidebar'))
        @section('right-sidebar')
            <div class="col-md-3 col-sm-12">
                <aside class="sidebar-right">
                    {{ Widget::group('right_sidebar') }}
                </aside>
            </div>
        @show
        @endif
    </div>
</div>