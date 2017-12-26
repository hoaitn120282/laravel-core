<?php
$on = empty($on) ? 'On' : $on;
$off = empty($off) ? 'Off' : $off;
$inputSlug = str_slug($input['name']);

?>
@if (!empty($input['label']))
    <label for="{{ $inputSlug }}">{{ $input['label'] }}</label>
@endif
<div class="x_switch">
    <input type="checkbox"
           name="{{ $input['name'] }}"
           value="{{ $input['value'] }}"
           @if(isset($input['options']) && is_array($input['options']))
           @foreach($input['options'] as $key => $option)
           data-{{$key}}='{{$option}}'
           @endforeach
           @endif
           id="{{$inputSlug}}"
            {{ (1 == $input['value']) ? 'checked':'' }}>
    <div class="{{ (1 == $input['value']) ? 'Switch On':'Switch Off' }}">
        <div class="Toggle"></div>
        <span class="On">{{ $on }}</span> <span class="Off">{{ $off }}</span>
    </div>
</div>

@push('style-top')
<style>
    .x_switch input[type="checkbox"] {
        display: none;
    }

    .x_switch .Switch {
        position: relative;
        display: inline-block;
        font-weight: bold;
        color: #ccc;
        text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.8);
        padding: 6px 6px 7px 6px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        background: #ececec;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1), inset 0px 1px 3px 0px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        font-size: 16px;
    }

    body.IE7 .x_switch .Switch {
        width: 78px;
    }

    .x_switch .Switch span {
        display: inline-block;
        width: 60px;
        color: rgb(38, 185, 154)
    }

    .x_switch .Switch span.On {
        color: rgb(38, 185, 154);
    }

    .x_switch .Switch .Toggle {
        position: absolute;
        top: 1px;
        width: 65px;
        height: 34px;
        border: 1px solid rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        background: #fff;
        background: -moz-linear-gradient(top, #ececec 0%, #ffffff 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ececec), color-stop(100%, #ffffff));
        background: -webkit-linear-gradient(top, #ececec 0%, #ffffff 100%);
        background: -o-linear-gradient(top, #ececec 0%, #ffffff 100%);
        background: -ms-linear-gradient(top, #ececec 0%, #ffffff 100%);
        background: linear-gradient(top, #ececec 0%, #ffffff 100%);
        box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.5);
        z-index: 999;
        -webkit-transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        -ms-transition: all 0.15s ease-in-out;
    }

    .x_switch .Switch .Toggle:before {
        content: '|||';
        display: block;
        text-align: center;
        top: 50%;
        position: absolute;
        width: 100%;
        left: 0;
        transform: translateY(-50%);
    }

    .x_switch .Switch.On .Toggle {
        left: 50%;
    }

    .x_switch .Switch.Off .Toggle {
        left: 0%;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        // Switch toggle
        $('.Switch').click(function () {
            // checked
            if ($(this).hasClass('On')) {
                $(this).closest('.x_switch').find('input:checkbox').prop('checked', true).change();
            }
            if ($(this).hasClass('Off')) {
                $(this).closest('.x_switch').find('input:checkbox').prop('checked', false).change();
            }

            $(this).toggleClass('On').toggleClass('Off');
        });

        $('.x_switch input:checkbox').on('change', function () {
//            $(this).closest('.x_switch').find('.Switch').toggleClass('On').toggleClass('Off');
        });
    });
</script>
@endpush