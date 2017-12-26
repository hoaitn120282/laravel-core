@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('ContentManager::partials.alert')
            @include('ContentManager::category.partials.tablemanage')
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("a[data-role='delete-post']").on("click", function () {
            var idpost = $(this).data('idpost');
            swal({
                title: "Are you sure to delete the selected category?",
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
                    url: "{{ Admin::route('contentManager.category.index') }}/" + idpost,
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
                title: "Are you sure to delete the selected category?",
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
                    url: "{{ Admin::route('contentManager.category.index') }}/" + id,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
//                            swal("Deleted!", "Delete Success", "success");
                            location.reload();
                        });
            });
            return false;
        });
    });
</script>
@endpush