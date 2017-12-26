<div class="form-group">
    <input id="title"  name="title" value="{{ $options['title'] }}" class="form-control" type="hidden"/>
</div>

<div class="fieldset-content">
    <div class="form-group">
         @include("widgets.{$theme}.{$widget}.partials.input_upload", [
           'idModal'=> $options['baseID'],
            'model' => $options['avatar'],
            'label' => 'Doctor Avatar',
            'input'=>'avatar'
        ])
    </div>


    <div class="form-group">
        <label for="title" class="control-label">Link make appointment</label>
        <input id="addLink" class="form-control" name="make_appointment" value="{{ $options['make_appointment'] }}"/>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Doctor name</label>
        <input id="name" value="{{ $options['name'] }}"
                class="form-control" type="text" name="name">
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Description doctor</label>
        <textarea id="description" class="form-control" 
        name="description" rows="3">{{ $options['description'] }}</textarea>
    </div>
</div>

@push('scripts')
<script>
// Click add Custom Link to Menu
        $('#addLink').on('change', function () {
            var flag = false;
            var customUrl = $(this).val();
            if (customUrl == '#') {
                $(this).removeClass('warring');
            } else {
                if (!(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(customUrl))) {

                    $(this).addClass('warring');
                    return;
                } else {
                    $(this).removeClass('warring');

                }
            }

            var customText = $('#addLink').val();

            if (customText == '') {
                $('#addLink').addClass('warring');
                return;
            } else {
                $('#addLink').removeClass('warring');
            }
        });
</script>
@endpush