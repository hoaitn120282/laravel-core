<?php
$languages = Trans::languages();
?>
<!-- Nav tabs -->
@if(count($languages)>1)
    <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
        @foreach($languages as $key => $language)
            <li role="presentation" class="{{ (0 == $key) ? 'active': '' }}">
                <a href="#{{ "language_{$language->country->locale}" }}"
                   aria-controls="{{ "language_{$language->country->locale}" }}"
                   role="tab" data-toggle="tab">{{ $language->name }}</a>
            </li>
        @endforeach
    </ul>
@endif
<!-- Tab panes -->
<div class="tab-content">
    @foreach($languages as $key => $language)
        <div role="tabpanel"
             class="tab-pane {{ ((Trans::locale() == $language->country->locale) ||
              (count($languages) <=1)) ? 'active': '' }}"
             id="{{ "language_{$language->country->locale}" }}">
            <div class="form-group">
                <label for="title" class="control-label">Title</label>
                <input type="text"
                       name="{{ "title_{$language->country->locale}" }}"
                       value="{{ $options["title_{$language->country->locale}"]  or null }}"
                       class="form-control"
                       id="title">
            </div>
            <div class="form-group">
                <label for="title" class="control-label">Description</label>
                <textarea name="{{ "description_{$language->country->locale}" }}"
                          class="form-control"
                          rows="3">{{ $options["description_{$language->country->locale}"] or null }}</textarea>
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="icon-class" class="control-label">Icon class</label>
    <input type="text"
           name="icon_class"
           value="{{ $options['icon_class'] }}"
           class="form-control"
           id="icon-class">
</div>
<input type="hidden" name="title" value="{{ $options["title_".Trans::locale()] }}">

@push('scripts')
<script>
    (function (Sbd) {
        Sbd('input[name="title_{{ Trans::locale() }}"]').on('change', function () {
            var val = Sbd(this).val();
            Sbd('input[name="title"]').val(val);
        });
    })(jQuery);
</script>
@endpush