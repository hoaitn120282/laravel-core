<div class="header-slide owl-carousel owl-theme">
    {{--Validate Slider Type--}}
    @if($options['type'] === 'gallery')
        @foreach ($model as $value)
            <div class="slide-item">
                <figure>
                    <img src="{{ asset("uploads/gallery/{$options['gallery_id']}/{$value->image_name}") }}"
                         alt="{{ $value->image_title }}" title="{{ $value->image_title }}">
                </figure>
                <div class="make-appointment text-center">
                    <h1 class="header-title">{{ $value->image_title }}</h1>
                    <p class="header-sologan">{!! $value->image_description !!}</p>
                    <a href="{{ $options['appointment_link'] }}" class="btn btn-make-appointment">{{ Trans::face('make_appointment') }}</a>
                </div>
            </div>
        @endforeach
    @else
        {{--Begin /Post or Category Slider--}}
        @foreach ($model as $value)
            <div class="slide-item">
                @if(!empty($value->getMetaValue('featured_img')))
                    <figure>
                        <img src="{{ $value->getMetaValue('featured_img') }}"
                             alt="{{ $value->post_title }}" title="{{ $value->post_title }}">
                    </figure>
                @endif
                <div class="make-appointment text-center">
                    <h1 class="header-title">{{ $value->post_title }}</h1>
                    <p class="header-sologan">{!! $value->getExcerpt() !!}</p>
                    <a href="{{ '' }}" class="btn btn-make-appointment">{{ Trans::face('make_appointment') }}</a>
                </div>
            </div>
        @endforeach
        {{--End /Post or Category Slider--}}
    @endif
</div>

@push('scripts')
<script>
    jQuery.fn.exists = function(){return this.length>0;};
    jQuery(document).ready(function($) {

        $('.header-slide').owlCarousel({
            items: 1,
            nav: true,
            navText: ["<img src='{{ Theme::asset('images/icon/icon-prev.png') }}'>","<img src='{{ Theme::asset('images/icon/icon-next.png') }}'>"],
        });
    });
</script>
@endpush