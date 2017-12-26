<?php
if (!empty($node)) {
    $layout = $node->meta()->optionsKey('layouts')->first();
}

$options = array();
$layoutStyle = array();
$values = empty($layout) ? array() : $layout->getValue();
if (!empty($values)) {
    foreach ($values as $val) {
        if ($val['name'] == 'layout_style') {
            $options = $val['options'];
            $layoutStyle = $val;
            break;
        }
    }
}
?>
<h1 class="title text-center">{{ $node->name or '' }}</h1>
<p class="help-block">To create a new theme, it is required to select at least 1 layout below.</p>

<ul class="list-inline">
    @forelse($options as $option => $optionVal)
        <li>
            <div class="layout-thumbnail">
                @if(empty($node->parent))
                    <img src='{{ url("/themes/$node->machine_name/images/$option.png") }}'>
                @else
                    <img src='{{ url("/themes/".$node->parent->machine_name."/images/$option.png") }}'>
                @endif
                <div class="text-center">
                    <label for="{{ $option }}">
                        <input type="checkbox"
                               name="meta[layouts][layout_style][{{$option}}]" value="{{ $option }}"
                               id="{{ $option }}" class="flat" data-role="checkbox"
                                {{ empty($isEdit) ? (empty($node->parent_id) ? 'checked="checked"' : (in_array($option, array_keys((array)$layoutStyle['value'])) ? 'checked="checked"':'')) :  (in_array($option, array_keys((array)$layoutStyle['value'])) ? 'checked="checked"':'') }}>
                        {{ $optionVal }}
                    </label>
                </div>
            </div>
        </li>
    @empty
        <li>Empty layouts</li>
    @endforelse
</ul>