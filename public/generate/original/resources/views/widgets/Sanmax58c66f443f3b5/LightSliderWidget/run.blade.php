<ul init="lightSlider" class="gallery list-unstyled cS-hidden">
    {{--Validate Slider Type--}}
    @if($options['type'] === 'gallery')
        {{--Begin /Gallery Slider--}}
        @foreach ($model as $value)
            <li data-thumb="{{ asset("uploads/gallery/{$options['gallery_id']}/{$value->image_name}") }}">
                <img src="{{ asset("uploads/gallery/{$options['gallery_id']}/{$value->image_name}") }}"/>
            </li>
        @endforeach
        {{--End /Gallery Slider--}}
    @else
        {{--Begin /Post or Category Slider--}}
        @foreach ($model as $value)
            <li data-thumb="{{ asset("uploads/gallery/{$options['gallery_id']}/{$value->image_name}") }}">
                <img src="{{ asset("uploads/gallery/{$options['gallery_id']}/{$value->image_name}") }}"/>
            </li>
        @endforeach
        {{--End /Post or Category Slider--}}
    @endif
</ul>
