<section class="tips">
    <div class="container">
        <h3 class="article-title"><span>{{ $options['title'] }}</span></h3>

        <div class="tips-slide owl-carousel owl-theme">
            @if(!empty($model))
                @foreach ($model as $value)
                    <div class="row">
                        @foreach($value as $node)
                            @if(!empty($node))
                                <div class="col-sm-4">
                                    <div class="tip-detail">
                                        <div class="tip-content">
                                            <h3>{{ $node->post_title }}</h3>

                                            <p>{!! $node->getExcerpt() !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>