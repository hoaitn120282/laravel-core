<?php

$main_class = Widget::existsGroup('left_sidebar') ? 'col-md-9 col-sm-12' : 'col-md-12 col-sm-12';
?>

<div class="content">
    <div class="container">
        <div class="row">
            @if(Widget::existsGroup('left_sidebar'))
                <div class="col-md-3 col-sm-12">
                    <aside class="sidebar-right">
                        @section('left-sidebar')
                            {{ Widget::group('left_sidebar') }}
                        @show
                    </aside>
                </div>
            @endif

            <div class="{{ $main_class }}">@yield('content')</div>
        </div>
    </div>
</div>