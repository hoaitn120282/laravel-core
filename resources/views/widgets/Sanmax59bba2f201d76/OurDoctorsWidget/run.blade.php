<section class="our-doctors">
    <div class="container">
        <h3 class="article-title"><span>{{ $options['title'] }}</span></h3>
        <div class="row">
            @foreach($model as $value)
                <div class="col-sm-4">
                    <article class="doctor-detail text-center">
                        @if($value->getMetaValue('featured_img'))
                            <figure>
                                <a href="{{ Theme::route('doctor.show', ['slug' => $value->post_name]) }}">
                                    <img src="{{ $value->getMetaValue('featured_img') }}" alt="{{ $value->post_title }}"
                                         title="{{ $value->post_title }}">
                                </a>
                            </figure>
                        @endif
                        <h4>{{ $value->post_title }}</h4>
                        <p>{!! $value->getExcerpt(10) !!}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>