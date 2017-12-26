<div class="modal fade" id="modal-{{$data['name']}}" tabindex="-1" role="dialog" aria-labelledby="{{$data['name']}}Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Upload your file or select media</h4>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li id="{{ $data['name'] }}tab-home" role="presentation" class="active">
                        <a href="#{{ $data['name'] }}home" aria-controls="{{ $data['name'] }}home" role="tab"
                           data-toggle="tab">Upload Image</a>
                    </li>
                    <li id="{{ $data['name'] }}tab-image" role="presentation">
                        <a href="#{{ $data['name'] }}image" aria-controls="{{ $data['name'] }}image" role="tab"
                           data-toggle="tab">Images</a>
                    </li>
                </ul>
                <div id="media-content" class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="{{ $data['name'] }}home">
                        <div id="file-upload{{ $data['name'] }}" class="mydropzone dropzone">
                            <div class="dz-default dz-message">
                                <div>
                                    <i class="fa fa-cloud-upload fa-5x"></i>
                                </div>
                                <span>Drop files here to upload</span>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="{{ $data['name'] }}image">
                        <div class="row">
                            <?php $medias = Admin::media(); ?>
                            @foreach($medias as $value)
                                <div class="col-md-4">
                                    <div class="image-select">
                                        @if(isset($data['name']))
                                            <a href="#" class="btn-add-image-preview"
                                               onclick="setimage{{$data['name']}}('{{ url('/uploads').'/'.$value->post_name }}', '{{$elSelect or null}}');return false;">
                                                <img class="img-responsive" src="{{ url('/uploads').'/'.$value->post_name }}" /></a>
                                        @else
                                            <a href="#" class="btn-add-image-preview"
                                               onclick="setimage('{{ url('/uploads').'/'.$value->post_name }}', '{{$elSelect or null}}');return false;">
                                                <img class="img-responsive" src="{{ url('/uploads').'/'.$value->post_name }}" /> </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                {{ $medias->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@pushonce('style')
<link href="{{ asset("assets/dropzone/dropzone.min.css") }}" rel="stylesheet">
@endpushonce
@pushonce('scripts')
<script src="{{ asset("assets/dropzone/dropzone.min.js")  }}"></script>
@endpushonce
@push('scripts')
<script>
    var myDropzone = new Dropzone("div#file-upload{{ $data['name'] }}", {
        url: "{{ Admin::route('contentManager.media.store') }}"
    });
    myDropzone.on("sending", function(file, xhr, formData) {
        formData.append("_token", "{{ csrf_token() }}");
    });
    myDropzone.on("queuecomplete", function(file, xhr, formData) {
        getPosts{{ $data["name"] }}('{{ Admin::route("contentManager.media.images") }}');
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts{{ $data['name'] }}($(this).attr('href'));
            e.preventDefault();
        });
        $("#btn-{{$data['name']}}").on('click',function(){
            defaultActive{{ $data['name'] }}();
            $("#modal-{{$data['name']}}").modal("show");
        });

        $("#modal-{{$data['name']}}").on('show.bs.modal', function (e) {
            defaultActive{{ $data['name'] }}();
        });
    });

    function defaultActive{{ $data["name"] }}(act = "home"){
        $('#{{ $data["name"] }}tab-home').removeClass("active");
         $('#{{ $data["name"] }}home').removeClass("active");
         $('#{{ $data["name"] }}tab-image').removeClass("active");
         $('#{{ $data["name"] }}image').removeClass("active");

         $('#{{ $data["name"] }}tab-'+act).addClass("active");
         $('#{{ $data["name"] }}'+act).addClass("active");

    }
    
    function setimage{{$data['name']}}(img){
        $("#img-{{ $data['name'] }}").attr("src",img);
        $("#modal-{{$data['name']}}").modal("hide");
        $("#input-{{ $data['name'] }}").val(img);
        $("#{{ $data['name'] }}").summernote('insertImage', img);
    }

    function getPosts{{$data['name']}}(page) {
        $.ajax({
            url : page,
            dataType: 'json',
            data:{name:"{{ $data['name'] }}"}
        }).done(function (data) {
            $('#{{ $data["name"] }}image').html(data);
            defaultActive{{ $data["name"] }}("image");
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
</script>
@endpush