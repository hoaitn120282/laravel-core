<?php
$options = $node->meta()
        ->optionsKey('layouts', '<>')
        ->optionsKey('typography', '<>')
        ->optionsKey('general', '<>')
        ->get();
$layout = $node->meta()
        ->optionsKey('layouts')
        ->first();
$general = $node->meta()
        ->optionsKey('general')
        ->first();

?>
@extends(Admin::theme())

@section('content')
    <div class="frm-edit-theme">
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Theme infomation</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        @if($node->status)
                            <li><a href="#" onclick="return false;"><strong class="text-primary">Activated</strong></a></li>
                        @else
                            <li><a href="{{Admin::route('contentManager.theme.active', ['id'=>$node->id])}}"
                                   style="background-color:#449d44;color:#fff;padding-left:20px;padding-right:20px">Active</a>
                            </li>
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <dl>
                                <dt><span class="labl">Theme name</span> <span class="text">{{$node->name}}</span></dt>
                                <dt><span class="labl">Author name</span> <a href="{{$node->author_url}}"><span class="text">{{$node->author}}</span></a></dt>
                                <dt><span class="labl">Description</span> <span class="text">{{$node->description}}</span></dt>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <img style="width: 100%; display: block;"
                                 src="{{ url($node->image_preview) }}" alt="image">
                        </div>

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Theme Options</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-xs-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="active">
                                                <a href="#tab-general"
                                                   data-toggle="tab">General Configuration</a>
                                            </li>
                                            <li><a href="#tab-{{$layout->meta_key}}"
                                                   data-toggle="tab">Layout settings</a>
                                            </li>
                                            @foreach($options as $key => $meta)
                                                <li><a href="#tab-{{$meta->meta_key}}"
                                                       data-toggle="tab">{{ ucwords(str_replace("_", " ", $meta->meta_key)) }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <form method="POST" action="{{ Admin::route('contentManager.theme.update') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $node->id }}" name="idtheme">
                                        <div class="col-xs-12">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                @include('ContentManager::theme.partials.cfg_general', ['meta' => $general])
                                                @include('ContentManager::theme.partials.layouts', ['meta' => $layout])
                                                @foreach($options as $key => $meta)
                                                    @include('ContentManager::theme.partials.generate', ['meta' => $meta])
                                                @endforeach
                                            </div>
                                            <div class="toolbar-actions">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style-top')
<link rel="stylesheet" href="{{ asset('assets/colorpicker/css/colorpicker.css') }}">
<style>
    .frm-edit-theme dl dt {
        font-size: 16px;
        margin-bottom: 10px;
    }
    .frm-edit-theme dl .labl {
        margin-right: 40px;
    }
    .frm-edit-theme dl span.text {
        color: #0671b9;
        font-weight: 400;
    }
    .frm-edit-theme .x_panel {
        padding-bottom: 90px;
    }

    #tab-layouts #template-default {
        display: block;
    }

    #tab-layouts .template-layout {
        display: none;
    }

    fieldset legend {
        color: #169F85;
    }

    fieldset .fieldset-content {
        margin-left: 30px;
    }

    .toolbar-actions {
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
</script>
@endpush