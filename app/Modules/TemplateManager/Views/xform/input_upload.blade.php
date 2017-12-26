<?php
$inputSlug = str_slug($input, '_');

?>
<div class="frm-ctrl-wrap">
    <label for="feature_image">{{ $label }}</label>
    <button id="btn-{{$inputSlug}}" type="button" class="btn btn-success btn-md " style="display: block;">
        <i class="fa fa-upload"></i> Choose file...
    </button>
    <div id="btn-upload-{{$inputSlug}}-preview" class="img-res"
         style='background-image: url("{{ empty($model) ? old($input) : $model }}"); display: {{ (empty($model) && empty(old($input))) ? 'none':'block' }}'>
        <div class="mask">
            <a href="#" class="del-img"
               onclick="deleteImage('{{$inputSlug}}');return false;">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <input type="hidden" id="{{$inputSlug}}" class="form-control"
           name="{{$input}}" value="{{ empty($model) ? old($input) : $model }}"
           placeholder="Choose file...">
</div>
<div class="modal fade" id="modal-{{$inputSlug}}" tabindex="-1" role="dialog" aria-labelledby="{{ $inputSlug }}Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Upload your file or select media</h4>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li id="tab-{{$inputSlug}}-home" role="presentation" class="active">
                        <a href="#{{$inputSlug}}-home" aria-controls="{{$inputSlug}}-home" role="tab" data-toggle="tab">Upload
                            Image</a>
                    </li>
                    <li id="tab-{{$inputSlug}}-image" role="presentation">
                        <a href="#{{$inputSlug}}-image" aria-controls="{{$inputSlug}}-image" role="tab"
                           data-toggle="tab">Images</a>
                    </li>
                </ul>
                <div id="media-content" class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="{{$inputSlug}}-home">
                        <div id="file-upload-{{$inputSlug}}" class="mydropzone dropzone">
                            <div class="dz-default dz-message">
                                <div>
                                    <i class="fa fa-cloud-upload fa-5x"></i>
                                </div>
                                <span>Drop files here to upload</span>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="{{$inputSlug}}-image">
                        @include('TemplateManager::xform.selectimage',['model'=>Admin::media(), 'selectImage' => $inputSlug])
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!-- /.modal-form-upload -->

@push('style-top')
<link href="{{ asset('assets/dropzone/dropzone.min.css') }}" rel="stylesheet">
<style>
    #btn-upload-{{$input}}-preview {
        margin: 0 auto;
    }

    .img-res {
        display: none;
        height: 190px;
        width: 250px;
        max-width: 100%;
        background-size: cover;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        position: relative;
    }

    .img-res:hover .mask {
        display: block;
    }

    .mask {
        width: 100%;
        height: 100%;
        text-align: center;
        display: none;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .mask:after {
        background-color: #000000;
        opacity: 0.5;
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .mask .del-img {
        position: absolute;
        color: #ffffff;
        z-index: 2;
        font-size: 28px;
        top: 50%;
        transform: translateY(-50%);
    }

</style>
@endpush
@push('scripts')
<script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#file-upload-{{$inputSlug}}", {
        url: "{{ Admin::route('contentManager.media.store') }}"
    });
    myDropzone.on("sending", function (file, xhr, formData) {
        formData.append("_token", "{{ csrf_token() }}");
    });
    myDropzone.on("queuecomplete", function (file, xhr, formData) {
        getPosts('{{ Admin::route("contentManager.media.images") }}', "{{$inputSlug}}");
    });

    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href'), "{{$inputSlug}}");
            e.preventDefault();
        });
        $("#btn-{{$inputSlug}}").on('click', function () {
            defaultActive("{{$inputSlug}}");
            $("#modal-{{$inputSlug}}").modal("show");
            summer = false;
            $('#tab-file').hide();

        });
    });

    if (typeof defaultActive !== "function") {
        function defaultActive(input, act='home') {
            $('#tab-' + input + '-home').removeClass('active');

            $('#tab-' + input + '-home').removeClass("active");
            $('#' + input + '-home').removeClass("active");
            $('#tab-' + input + '-file').removeClass("active");
            $('#' + input + '-file').removeClass("active");
            $('#tab-' + input + '-image').removeClass("active");
            $('#' + input + '-image').removeClass("active");

            $('#tab-' + input + '-' + act).addClass("active");
            $('#' + input + '-' + act).addClass("active");
        }
    }

    if (typeof setimage !== "function") {
        function setimage(img, input) {
//            $('#btn-upload-' + input + '-preview').attr("src", img);
            $('#btn-upload-' + input + '-preview').css('background-image', 'url(' + img + ')');
            $('#btn-upload-' + input + '-preview').css('display', 'block');

            $('#modal-' + input).modal("hide");
            $('#' + input).val(img);
        }
    }

    if (typeof getPosts !== "function") {
        function getPosts(page, input) {
            $.ajax({
                url: page,
                data: {
                    elSelect: input
                },
                dataType: 'json',
            }).done(function (data) {
                console.log(data);
                $('#' + input + '-image').html(data);
                defaultActive(input, "image");
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }
    }

    if (typeof deleteImage !== "function") {
        function deleteImage(input) {
            $('#btn-upload-' + input + '-preview').css('background-image', 'url()');
            $('#btn-upload-' + input + '-preview').css('display', 'none');
            $('#' + input).val("");
        }
    }

</script>
@endpush