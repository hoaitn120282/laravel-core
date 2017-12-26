<h3>{{ $options['title'] }}</h3>
<div class="news-item">
    @foreach($model as $value)
    <div class="item-detail">
        <div class="row">
            <figure class="col-xs-4">
                <a href="{{ Theme::route('post.show', ['slug' => $value->post_name]) }}">
                    <img class="media-object" src="{{ $value->getMetaValue('featured_img') }}" alt="{{ $value->post_title }}" title="{{ $value->post_title }}">
                </a>
            </figure>
            <div class="col-xs-8">
                <h4 class="title">
                    <a href="{{ Theme::route('doctor.show', ['slug' => $value->post_name]) }}">{{ $value->post_title }}</a>
                </h4>
                <p class="date">{{ Trans::face('Posted_on') . ' ' .$value->created_at->format('l') .', ' . $value->created_at->format('M d Y') .' at '.$value->created_at->format('h:i A')}}</p>
                <p class="text">{!! $value->getExcerpt(10) !!}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>