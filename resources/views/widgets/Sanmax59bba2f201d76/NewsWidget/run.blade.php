<section class="news">
    <div class="container">
        <h3 class="article-title"><span>{{ $options['title'] }}</span></h3>
        <div class="row">
            @if(!empty($model))
                @foreach ($model as $value)
                    <div class="col-sm-4">
                        <article class="new-detail">
                            @if(!empty($value->getMetaValue('featured_img')))
                                <figure>
                                    <a href="{{ Theme::route('post.show', ['slug' => $value->post_name]) }}">
                                        <img src="{{ $value->getMetaValue('featured_img') }}"
                                             alt="{{ $value->post_title }}" title="{{ $value->post_title }}">
                                    </a>
                                </figure>
                            @endif
                            <div class="new-content">
                                <h3>{{ $value->post_title }}</h3>
                                <i>{{ Trans::face('Posted_on') . ' ' .$value->created_at->format('l') .', ' . $value->created_at->format('M d Y') .' '.Trans::face('at').' '.$value->created_at->format('h:i A')}}</i>
                                <p>{!! $value->getExcerpt() !!}</p>
                            </div>
                            <a href="{{ Theme::route('post.show', ['slug' => $value->post_name]) }}"
                               class="btn btn-readmore pull-right">{{ Trans::face('read_more') }}</a>

                            <div class="new-date">
                                <p class="month">{{ $value->created_at->format('M') }}</p>
                                <p class="date">{{ $value->created_at->format('d') }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            @endif
        </div>
        <p class="text-center"><a href="{{ Theme::route('category.news') }}" class="btn btn-make-appointment">see more news</a>
        </p>
    </div>
</section>