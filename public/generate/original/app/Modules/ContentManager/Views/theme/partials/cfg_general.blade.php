<?php

$logo = $meta->getOption('logo');
$backgroundImage = $meta->getOption('background_image');
$copyRight = $meta->getOption('copyright');

?>
<div class="tab-pane active" id="tab-{{$meta->meta_key}}">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                @include('ContentManager::theme.partials.input_upload', [
                'idModal'=>'modal_general_logo',
                'model' => $logo,
                'label' => 'Logo',
                'help_text' => 'Logo resolution is 116x40px',
                'input' => 'meta[general][logo][value]'
                ])
            </div>
            <div class="col-md-4">
                @include('ContentManager::theme.partials.input_upload', [
                'idModal'=>'modal_general_image_preview',
                'model' => $node->image_preview,
                'label' => 'Feature image',
                'input' => 'image_preview'
                ])
            </div>
            <div class="col-md-4">
                @include('ContentManager::theme.partials.input_upload', [
                'idModal'=>'modal_general_background_image',
                'model' => $backgroundImage,
                'label' => 'Background image',
                'input' => 'meta[general][background_image][value]'
                ])
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="id-copyright">Copyright Text :</label>
                <input type="text" id="id-copyright" class="form-control"
                       value="{{ $copyRight }}"
                       name="meta[general][copyright][value]">
            </div>
        </div>
    </div>
</div>
