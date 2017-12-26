<script type="text/javascript">
    $(document).ready(function () {
        $("a[data-role='delete-template']").on("click", function () {
            var themeId = $(this).data('theme_id');
            var urlDelete = $(this).data('url');
            swal({
                title: "",
                text: "Are you sure to delete this template?",
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
                    url: urlDelete,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
                              location.reload();
                        });
            });
            return false;
        });
    });

</script>