<?php

$main_class = Widget::existsGroup('right_sidebar') ? 'col-md-9 col-sm-12' : 'col-md-12 col-sm-12';
?>

<div class="container">
    <div class="row">
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