<div class="sb-team-detail">
    <h3 class="sidebar-title">{{ $options['title'] }}</h3>
    <div class="row">
        @foreach($model as $value)
            <div class="col-md-12 col-sm-4">
                <div class="make-appointment">
                    @if($value->getMetaValue('featured_img'))
                        <figure>
                            <a href="{{ Theme::route('doctor.show', ['slug' => $value->post_name]) }}">
                                <img src="{{ $value->getMetaValue('featured_img') }}" alt="{{ $value->post_title }}"
                                     title="{{ $value->post_title }}">
                            </a>
                        </figure>
                    @endif
                    <header>
                        <h4>{{ $value->post_title }}</h4>
                        <p>{!! $value->getExcerpt(10) !!}</p>
                        <a href="{{ $value->getMetaValue('appointment_link') }}"
                           class="btn btn-make-appointment">{{ Trans::face('make_appointment') }}</a>
                    </header>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ Theme::route('doctors.team') }}" class="btn btn-seemore hidden-sm">{{ Trans::face('see_more') }}</a>
</div>