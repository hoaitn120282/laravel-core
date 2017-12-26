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
                },
                callbacks: {
                    onInit: function() {
                        $(document).on( "keyup", ".link-dialog .note-link-url", function() {
                            if (isUrlValid($(this).val()) === true) {
                                $('.modal-footer .note-link-btn').removeClass('disabled');
                                $('.modal-footer .note-link-btn').removeAttr( "disabled" )
                            }

                            if (isUrlValid($(this).val()) === false) {
                                $('.modal-footer .note-link-btn').addClass('disabled');
                                $('.modal-footer .note-link-btn').attr('disabled', 'disabled');
                            }
                        });

                        $(document).on( "keyup", ".link-dialog .note-link-text", function() {
                            $(this).attr('required', false);
                        });
                    }
                }
            });
        });
    });

    function isUrlValid(url) {
        return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
    }
</script>