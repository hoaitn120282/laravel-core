<?php
$isEdit = empty($isEdit) ? false : true;
?>
@extends(Admin::theme())

@section('back')
    <a href="{{ \URL::previous() }}">
        <strong> <i class="fa fa-arrow-left"></i> &nbsp; Back</strong>
    </a>
@endsection

@section('content')
    <div class="create-template">
        <div class="row">
            <form action="{{ empty($isEdit) ? Admin::route('templateManager.store') : Admin::route('templateManager.update', ['id' => $node->id]) }}"
                  method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="x_panel">
                    <div class="x_title">
                        @if($isEdit)
                            <h2>Edit theme</h2>
                            <div class="action pull-right">
                                @include('TemplateManager::xform.switch', [
                                    'on' => 'Publish',
                                    'off' => 'Draft',
                                    'input' => [
                                        'name' => 'publish',
                                        'value' => $node->is_publish,
                                        'options' => [
                                            'url' => Admin::route('templateManager.publish', ['id' => $node->id])
                                        ]
                                    ]
                                ])
                            </div>
                        @else
                            <h2>Create new theme</h2>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('TemplateManager::components.alert')
                        {{ csrf_field() }}
                        <input type="hidden" name="theme_id" value="{{ $node->id }}"/>
                        @include('TemplateManager::components.x_form')
                    </div>
                    <div class="clearfix"></div>
                    <!--Action-->
                    <div class="toolbar-actions">
                        <div class="pull-right">
                            @if($isEdit)
                                @if (!empty(session('response')['success']))
                                    <a href="{{ Admin::route('templateManager.preview', ['id' => $node->id]) }}"
                                       target="_blank"
                                       class="btn btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                    </a>
                                @endif
                                <button type="submit" name="update" class="btn btn-success">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Update
                                </button>
                            @else
                                <button type="button" name="draft" class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#Popup-Save-{{$node->id}}"
                                        data-title="Save as Draft"
                                        data-options='{"is_publish":0}'>
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Save as draft
                                </button>
                                <button type="button" name="publish" class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#Popup-Save-{{$node->id}}"
                                        data-title="Publish"
                                        data-options='{"is_publish":1}'>
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Publish
                                </button>

                                @include('TemplateManager::xform.popup_save', ['themeId' => $node->id, 'themeType' => (1 == $node->theme_type_id) ? 'simple':'medium'])
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('style-top')
<link rel="stylesheet" href="{{ asset('assets/colorpicker/css/colorpicker.css') }}">
<style>
    .create-template form .x_panel {
        padding-bottom: 70px;
    }

    .create-template .form-group {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .create-template .form-control {
        width: auto;
        max-width: 100%;
        min-width: 155px;
    }

    .create-template textarea.form-control {
        width: 100%;
    }

    .create-template #accordion .panel-title a {
        font-size: 20px;
        color: #337ab7;
        display: block;
    }

    .create-template #accordion .panel-title strong {
        display: inline-block;
    }

    .create-template #accordion .panel-title i.fa {
        display: inline-block;
    }

    .create-template #accordion .panel-title a[aria-expanded="true"] i.fa-angle-right:before {
        content: "\f107" !important;
    }

    .collapse.in i.fa {
    }

    .create-template fieldset {
        margin-top: 20px;
    }

    .create-template fieldset legend {
        font-weight: bold;
        color: #26b99a;
    }

    .create-template .tab-pane {
        padding-top: 15px;
    }

    .create-template .tab-pane .layout-thumbnail img {
        padding: 10px;
        border: 1px solid #ccc;
        margin: 10px;
    }

    .create-template .tab-pane .layout-thumbnail label {
        cursor: pointer;
    }

    .create-template .frm-ctrl-wrap {
        width: 200px;
        margin: 0 auto;
        max-width: 100%;
    }

    .create-template .toolbar-actions {
        margin-top: 15px;
        padding: 15px 35px 15px 15px;
        overflow: hidden;
        position: fixed;
        width: 100%;
        bottom: 36px;
        z-index: 9999;
        left: 0;
    }

    .color-picker {
        padding-left: 34px;
        height: 34px;
        position: relative;
        border: 1px solid #ccc;
        display: inline-block;
        cursor: pointer;
    }

    .color-picker:after {
        content: 'Select color';
        display: block;
        width: 119px;
        height: 32px;
        line-height: 32px;
        padding: 0 6px;
        background-color: #fff;
        font-size: 14px;
        border-left: 1px solid #ccc;
    }

    .input-color-picker {
        display: inline-block;
        width: 75px !important;
        padding: 4px 4px;
        display: none;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/colorpicker/js/colorpicker.js') }}"></script>
<script src="{{ asset('assets/dropzone/dropzone.min.js') }}"></script>

<script>
    $('.panel-collapse').on('shown.bs.collapse', function (e) {
        var $panel = $(this).closest('.create-template');
        $('html,body').animate({
            scrollTop: $panel.offset().top
        }, 0);
    });

    $('.color-picker').ColorPicker({
        onSubmit: function (hsb, hex, rgb, el) {
            $('.input-color-picker', el.closest('.wrap-color-picker')).val('#' + hex);
            $(el).css('backgroundColor', '#' + hex);
            $(el).ColorPickerHide();
        },
        onBeforeShow: function (colpkr) {
            var cal = $(colpkr).data('colorpicker');
            var col = cal.color;
            var val = $('.input-color-picker', $(this).closest('.wrap-color-picker')).val();
            $(this).ColorPickerSetColor(val);
        },
        onShow: function (colpkr) {
            var cal = $(colpkr).data('colorpicker');
            var el = cal.el;
            // $('.input-color-picker', el.closest('.wrap-color-picker')).show();
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            var cal = $(this).data('colorpicker');
            var el = cal.el;
            $('.input-color-picker', el.closest('.wrap-color-picker')).val('#' + hex);
            $(el).css('backgroundColor', '#' + hex);
        }
    });

    // Publish theme
    $(".x_switch input[type=checkbox]").on("change", function (event) {
        var element = this;
        switchPublish(element);
        event.preventDefault();
    });

    function switchPublish(element, options) {
        var url = $(element).data('url');
        swal({
            title: "",
            text: (element.checked ? 'Are you sure to save this template as draft?' : 'Are you sure to publish this template?'),
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Yes",
            confirmButtonClass: "btn-danger",
            cancelButtonText: "No"
        }, function (el) {
            if (el) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {"_token": "{{ csrf_token() }}"}
                }).done(function (res) {
                    console.log(res);
                    if (res.success) {
                        location.href = res.redirect
                    } else {
                        location.reload();
                    }
                });
            } else {
                $(element).closest('.x_switch').find('.Switch').toggleClass('On').toggleClass('Off');
                $(element).prop('checked', element.checked).change();
            }
        });
    }

    function validateForm() {
        var totalChecked = $('.icheckbox_flat-green.checked').length;
        if (totalChecked == 0) {
            swal("Please select at least one layout for the team!")
            return false;
        }
        return true;
    }

</script>
@endpush
