@extends(Theme::active().'.main')

@section('content')
<div class="content">
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <section class="site-content">
                    @if(!empty($model->getMetaValue('featured_img')))
                        <figure>
                            <img src="{{ $model->getMetaValue('featured_img') }}" alt="{{ $model->post_title }}"
                                title="{{ $model->post_title }}"/>
                        </figure>
                    @endif

                    <div class="ct-detail">
                        <h3>{{ $appTitle or $model->post_title }}</h3>
                        <div class="ct-content">{!! html_entity_decode($model->post_content) !!}</div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('appTitle')
    {{ $appTitle or $model->post_title }}
@endsection