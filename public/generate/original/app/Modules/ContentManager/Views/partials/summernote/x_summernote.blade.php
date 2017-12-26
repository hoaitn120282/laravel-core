@push('style-top')
<link href="{{ Url('/assets/summernote') }}/summernote.css" rel="stylesheet">
@endpush
<script src="{{ Url('/assets/summernote') }}/summernote.js"></script>
<script>
    $(document).ready(function () {
        $('.content-post').each(function () {
            var $this = $(this);
            var locale = $this.data('locale');
            var modal = $this.data('modal');
            $this.summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph', 'style']],
                    ['misc', ['link', 'fullscreen', 'codeview', 'SImage', 'video']]
                ],
                buttons: {
                    SImage: function (context) {
                        var ui = $.summernote.ui;
                        var button = ui.button({
                            contents: '<i class="fa fa-image"/>',
                            data: {'locale': locale},
                            tooltip: 'Image Media',
                            click: function () {
                                summer = true;
                                $('#modal-' + modal).modal('show');
                            }
                        });
                        return button.render();
                    }
                }
            });
        });
    });
</script>