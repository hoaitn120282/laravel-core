@extends(Theme::active().'.main')

@section('content')
    <section class="content-dt">
        @if(Widget::existsGroup('post_slider'))
            <div id="light-slider">
                {{ Widget::group('post_slider') }}
            </div>
        @endif
        <div class="ct-detail">
            @if($blogs)
                @foreach($blogs as $blog)
                    <h3>{{ $blog->post_title }}</h3>
                    <div>{!!html_entity_decode($blog->post_content)!!}</div>
                @endforeach
            @endif
        </div>
    </section>
@endsection

@section('appTitle')
    {{ $appTitle or null }}
@endsection

@section('left-sidebar')
    @parent
    <!-- You can overwrite left-sidebar on master layout -->
@endsection

@section('right-sidebar')
    @parent
    <!-- You can overwrite right-sidebar on master layout -->
@endsection