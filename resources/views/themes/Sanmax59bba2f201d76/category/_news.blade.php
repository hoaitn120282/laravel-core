@extends(Theme::active() . '.main')

@section('content')
    <section class="news news-page">
        <div class="bg-white">
            <div class="row" id="infinite">
                @if(count($nodes) > 0)
                    @foreach($nodes as $node)
                        <div class="col-sm-12">
                            <article class="new-detail">
                                @if(!empty($node->getMetaValue('featured_img')))
                                    <figure class="col-md-3 col-sm-5">
                                        <a href="{{ Theme::route('post.show', ['slug' => $node->post_name]) }}">
                                            <img src="{{ $node->getMetaValue('featured_img') }}"
                                                 alt="{{ $node->post_title }}" title="{{ $node->post_title }}">
                                        </a>
                                    </figure>
                                @endif

                                <div class="new-content col-md-9 col-sm-7">
                                    <h3>{{ $node->post_title }}</h3>
                                    <i>{{ Trans::face('Posted_on') . ' ' .$node->created_at->format('l') .', ' . $node->created_at->format('M d Y') .' at '.$node->created_at->format('h:i A')}}</i>
                                    <p>{!! $node->getExcerpt() !!}</p>
                                </div>
                                <a href="{{ Theme::route('post.show', ['slug' => $node->post_name]) }}"
                                   class="btn btn-readmore pull-right">{{ Trans::face('read_more') }}</a>
                                <div class="new-date">
                                    <p class="month">{{ $node->created_at->format('M') }}</p>
                                    <p class="date">{{ $node->created_at->format('d') }}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            </div>
            <p class="text-center">
                <a href="{{ $nodes->nextPageUrl() }}" data-url="{{ $nodes->nextPageUrl() }}"
                   class="btn btn-make-appointment"
                   id="infiniteScroll"
                   style="{{ ($nodes->currentPage() >= $nodes->lastPage()) ? 'display:none;':'' }}">{{ Trans::face('see_more_news') }}</a>
            </p>
        </div>
    </section>
    <!--End News-->
    <div class="loading">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
@endsection

@section('appTitle')
    {{ $appTitle or '' }}
@endsection

<style>
    #infinite {
        transition: 3s all linear;
    }

    .loading {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: 3s all linear;
    }

    .loading:after {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        background-color: #000000;
        opacity: 0.5;
        top: 0;
        position: absolute;
    }

    .loading .fa {
        color: #f48100;
        font-size: 55px;
        z-index: 9999;
        position: relative;
        margin: 0 auto;
        top: 50%;
        transform: translateY(-50%);
    }
</style>

@push('scripts')
@include(Theme::active().'.components.lazyload')
@endpush