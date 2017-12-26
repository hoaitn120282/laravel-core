@extends(Theme::active().'.main')

@section('content')
    <section class="content-dt content-info">
        @if(!empty($model->getMetaValue('featured_img')))
            <figure>
                <img src="{{ $model->getMetaValue('featured_img') }}" alt="{{ $model->post_title }}" title="{{ $model->post_title }}"/>
            </figure>
        @endif

        <div class="ct-detail">
            <h3>{{ $model->post_title }}</h3>
            <div class="ct-content">{!!html_entity_decode($model->post_content)!!}</div>
        </div>
    </section>
@endsection

@section('appTitle')
    {{ $appTitle or $model->post_title }}
@endsection

@section('left-sidebar')
    @parent
    <!-- You can overwrite left-sidebar on master layout -->
@endsection

@section('right-sidebar')
    @parent
    <!-- You can overwrite right-sidebar on master layout -->
@endsection