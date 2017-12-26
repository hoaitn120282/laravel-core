@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="x_panel">
    <div class="x_title">
      <h2>Gallery Images</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="{!! route('admin.galleryImages.create') !!}" class="btn-toolbox success"><i class="fa fa-plus"></i> Add New</a></li>
      </ul>
      <div class="clearfix"></div>
      @include('flash::message')
    </div>
    <div class="x_content">
      @include('admin.gallery_images.table')
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("a[data-role='delete-post']").on("click", function () {
            var url = $(this).data('url');
            swal({
                title: "Are you sure to delete the selected image?",
                text: "",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                confirmButtonClass: "btn-danger",
                cancelButtonText: "No"
            }, function () {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
                            location.reload();
                        });
            });
            return false;
        });

        $("#checkAll").change(function () {
            $("input:checkbox[name=checkbox]").prop('checked', $(this).prop("checked"));
            if ($("#btn-sel-del").css('display') == 'none') {
                $("#btn-sel-del").css("display", "inline-block");
            } else {
                $("#btn-sel-del").css("display", "none");
            }
        });

        $("input[type=checkbox]").on("change", function () {
            var n = $("input:checked[name=checkbox]").length;
            if (n == 0) {
                $("#btn-sel-del").css("display", "none");
            } else {
                $("#btn-sel-del").css("display", "inline-block");
            }
        });

        $("#btn-sel-del").on("click", function () {
            var array = new Array();
            $("input:checkbox[name=checkbox]:checked").each(function () {
                array.push($(this).val());
            });
            var id = array.join()
            swal({
                title: "Are you sure to delete the selected page?",
                text: "",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                confirmButtonClass: "btn-danger",
                cancelButtonText: "No"
            }, function () {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ Admin::route('contentManager.page.index') }}/" + id,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
                            swal("Deleted!", "Delete Success", "success");
                            location.reload();
                        });
            });
            return false;
        });
    });
</script>
@endpush
