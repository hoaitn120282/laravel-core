<?php

$template = $meta->getOption('layout_style', 'xvalue');
$layout_style = $meta->getOption('layout_style');
$layout_style = is_array($layout_style) ? $layout_style : [$layout_style => $layout_style];
?>
<div class="tab-pane" id="tab-{{$meta->meta_key}}">
    <fieldset>
        <legend>Select page</legend>
        <div class="fieldset-content">
            <div class="form-group">
                <select name="select_template"
                        class="select-template form-control"
                        style="width:auto;min-width: 300px;">
                    <option value="default">All</option>
                    <option value="post">Post</option>
                    <option value="page">Page</option>
                    <option value="category">Category</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Select layout</legend>
        <div class="fieldset-content">
            @include('ContentManager::theme.partials.select_layout', ['option' => 'default'])
            @include('ContentManager::theme.partials.select_layout', ['option' => 'post'])
            @include('ContentManager::theme.partials.select_layout', ['option' => 'page'])
            @include('ContentManager::theme.partials.select_layout', ['option' => 'category'])
            @include('ContentManager::theme.partials.select_layout', ['option' => 'doctor'])
        </div>
    </fieldset>
</div>

@push('scripts')
<script>
    $('select[name="select_template"]').on('change', function (event) {

        $('.template-layout', '#tab-layouts').css("display", "none");
        $('#template-' + $(this).val(), '#tab-layouts').css("display", "block");
        event.preventDefault();
    });
</script>
@endpush