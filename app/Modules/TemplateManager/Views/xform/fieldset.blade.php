<fieldset>
    <legend>{{ $field['label'] }}</legend>
    @foreach($field['items'] as $item)
        <div class="form-group col-md-4">
            @if ('input_upload' == $item['type'])
                @include('TemplateManager::xform.input_upload', [
            'idModal'=>'modal_'.$item['name'], 'model' => $item['value'], 'label' => $item['label'], 'input'=>$groups.'['.$field['name'].']['.$item['name'].']'
            ])
            @else
                @include('TemplateManager::xform.'.$item['type'], ['group' => $groups.'['.$field['name'].']', 'input' => $item])
            @endif
        </div>
    @endforeach
</fieldset>
<div class="clearfix"></div>