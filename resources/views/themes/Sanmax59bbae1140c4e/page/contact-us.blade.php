@extends(Theme::active().'.main')

@section('content')
    <section class="content-dt content-contact">
        <div class="ct-detail">
            <h3>{{ $model->post_title }}</h3>
            <p>{!!html_entity_decode($model->post_content)!!}</p>

            @if(Widget::existsGroup('top_content'))
                <ul class="contact-info list-unstyled">
                    {{ Widget::group('top_content') }}
                </ul>
            @endif

            @if(Widget::existsGroup('bottom_content'))
                <div class="contact-map">
                    {{ Widget::group('bottom_content') }}
                </div>
            @endif
        </div>
    </section>
@endsection

@section('appTitle')
    {{ $appTitle or $model->post_title }}
@endsection
