@extends(Theme::active().'.main')

@section('content')
    <section class="news-page-detail">
        <header>
            <div class="new-date">
                <p class="month">{{ $model->created_at->format('M') }}</p>
                <p class="date">{{ $model->created_at->format('d') }}</p>
            </div>
            <div class="news-detail-title">
                <h2>{{ $model->post_title }}</h2>
                <p>Posted on {{ $model->created_at->format('l') }}, {{ $model->created_at->format('M d Y') }} at {{ $model->created_at->format('h:i A') }}</p>
            </div>
        </header>
        <div class="news-text">
            {!! html_entity_decode($model->post_content) !!}
        </div>
    </section>
@endsection

@section('appTitle')
    {{ $appTitle or $model->post_title }}
@endsection