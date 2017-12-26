<div class="tab-pane" id="tab-{{$meta->meta_key}}">
    @foreach($meta->getValue() as $value)
        @include('ContentManager::theme.partials.'.$value['type'], ['data' => $value, 'groups' => 'meta['.$meta->meta_key.']'])
    @endforeach
</div>