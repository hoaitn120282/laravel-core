<?php

if (!empty($node)) {
    $typography = $node->meta()->optionsKey('typography')->first();
    $general = $node->meta()->optionsKey('general')->first();
}
$featureImage = null;
$typoOpts = empty($typography) ? array() : $typography->getValue();
$basicOpts = array_filter($typoOpts, function ($opt) {
    if (!isset($opt['xtype']) || ('basic' == $opt['xtype'])) {
        return $opt;
    }
});
$advanceOpts = array_filter($typoOpts, function ($opt) {
    if (isset($opt['xtype']) && ('advance' == $opt['xtype'])) {
        return $opt;
    }
});
$backgroundImg = empty($general) ? array() : $general->getOption('background_image');
$customcss = empty($general) ? array() : $general->getOption('customcss');
?>

<h1 class="title text-center" xmlns="http://www.w3.org/1999/html">{{ $node->name or '' }}</h1>
<div class="">

    <div class="clearfix"></div>

    <!-- .Typography -->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default panel-basic-configuration">
            <div class="panel-heading" role="tab" id="heading-basic-configuration">
                <h4 class="panel-title">
                    <a role="button" href="#collapse-basic-configuration"
                       data-toggle="collapse"
                       data-parent="#accordion"
                       aria-expanded="true"
                       aria-controls="collapse-basic-configuration">
                        <strong>Basic Configuration</strong>
                        <i class="fa fa-angle-right pull-right" aria-hidden="true"></i>
                    </a>
                </h4>
            </div>
            <div id="collapse-basic-configuration"
                 class="panel-collapse collapse in"
                 role="tabpanel" aria-labelledby="heading-basic-configuration">
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group col-md-4">
                            @include('TemplateManager::xform.input_upload',[
                            'idModal'=>'image_preview', 'model' => $node->image_preview, 'label' => 'Feature image', 'input'=>'image_preview'
                            ])
                        </div><!-- feature-image -->
                        <div class="form-group col-md-4">
                            @include('TemplateManager::xform.input_upload',[
                            'idModal'=>'general_background_image', 'model' => $backgroundImg, 'label' => 'Background image', 'input'=>'meta[general][background_image]'
                            ])
                        </div><!-- feature-image -->
                    </fieldset>

                    @foreach($basicOpts as $field)
                        @include('TemplateManager::xform.'.$field['type'], ['field' => $field, 'groups' => 'meta[typography]'])
                    @endforeach
                </div>
            </div>
        </div><!-- /.panel-basic-configuration -->

        <div class="panel panel-default panel-advance-configuration">
            <div class="panel-heading" role="tab" id="heading-advance-configuration">
                <h4 class="panel-title">
                    <a role="button" href="#collapse-advance-configuration"
                       data-toggle="collapse"
                       data-parent="#accordion"
                       aria-expanded="false"
                       aria-controls="collapse-advance-configuration">
                        <strong>Advanced Configuration</strong>
                        <i class="fa fa-angle-right pull-right" aria-hidden="true"></i>
                    </a>
                </h4>
            </div>
            <div id="collapse-advance-configuration"
                 class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-advance-configuration">
                <div class="panel-body">
                    @foreach($advanceOpts as $field)
                        @include('TemplateManager::xform.'.$field['type'], ['field' => $field, 'groups' => 'meta[typography]'])
                    @endforeach

                        <fieldset>
                            <legend>Custom CSS</legend>
                            <textarea name="meta[general][customcss]" id="custom-css" class="form-control"
                                      rows="5">{{ $customcss or null }}</textarea>
                        </fieldset>
                </div>
            </div>
        </div><!-- /.panel-advance-configuration -->
    </div>
<!-- /.Typography -->


</div>
