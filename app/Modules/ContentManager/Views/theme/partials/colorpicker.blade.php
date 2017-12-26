<?php
$group = isset($group) ? $group : null;
?>
<div class="frm-ctrl-wrap">
    <label for="{{ $group.'['.$data['name'].']' }}">{{ $data['label'] or $data['name'] }}</label>
    <div class="wrap-color-picker">
        <a class="color-picker" style="background-color: {{$data['value'] or "#fff"}}"></a>
        <input type="text" class="form-control input-color-picker" name="{{ $group.'['.$data['name'].'][value]' }}"
               value="{{$data['value'] or "#fff"}}">
    </div>
</div>
