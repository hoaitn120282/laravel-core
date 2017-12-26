<?php

$main_class = (Widget::existsGroup('left_sidebar') && Widget::existsGroup('right_sidebar')) ?
        'col-md-6 col-sm-12' :
        (Widget::existsGroup('left_sidebar') || Widget::existsGroup('right_sidebar') ? 'col-md-9 col-sm-12' : 'col-md-12 col-sm-12');
?>

<div class="content"  >
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

			@if(Widget::existsGroup('right_sidebar'))
				<div class="col-md-3 col-sm-12">
					<aside class="sidebar-right">
					@section('right-sidebar')
						{{ Widget::group('right_sidebar') }}
					@show
					</aside>
				</div>
			@endif
		</div>
	</div>
</div>