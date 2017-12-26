<?php

$groups = isset($groups) ? $groups : null;

?>
<fieldset>
    <legend>{{ $data['label'] }}</legend>
    @foreach($data['items'] as $item)
        <div class="form-group col-md-4">
            @if ('input_upload' == $item['type'])
                @include('ContentManager::theme.partials.input_upload', [
            'idModal'=>'modal_'.$item['name'], 'model' => $item['value'], 'label' => $item['label'], 'input'=>$groups.'['.$data['name'].']['.$item['name'].'][value]'
            ])
            @else
                @include('ContentManager::theme.partials.'.$item['type'], ['group' => $groups.'['.$data['name'].']', 'data' => $item])
            @endif
        </div>
    @endforeach
</fieldset>
<div class="clearfix"></div>