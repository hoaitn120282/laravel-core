<form action="{{ empty($node) ?
    Admin::route('languageManager.translate.store') :
    Admin::route('languageManager.translate.update', ['id' => $node->id]) }}" method="post">

    @if(!empty($node))
        <input type="hidden" name="_method" value="put">
    @endif
    {{ csrf_field() }}
    <div class="form-group">
        <label for="trans_key">Key <span class="text-danger">*</span></label>
        <input type="text" name="trans_key" value="{{ $node->trans_key or old('trans_key') }}"
               id="trans_key" class="form-control">
    </div><!-- /.trans_key -->
    <div class="trans_meta">
        <label>Translation</label>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
            @foreach($languages as $key => $language)
                <li role="presentation" class="{{ (0 == $key) ? 'active': '' }}">
                    <a href="#{{ "language_{$language->country->locale}" }}"
                       aria-controls="{{ "language_{$language->country->locale}" }}"
                       role="tab" data-toggle="tab">{{ $language->name }}</a>
                </li>
            @endforeach
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            @foreach($languages as $key => $language)
                <div role="tabpanel" class="tab-pane {{ (0 == $key) ? 'active': '' }}"
                     id="{{ "language_{$language->country->locale}" }}">
                    <input type="hidden"
                           name="trans_meta[{{ $language->country->locale }}][language_id]"
                           value="{{ $language->language_id }}">
                    <input type="hidden"
                           name="trans_meta[{{ $language->country->locale }}][country_id]"
                           value="{{ $language->country->country_id }}">
                    <div class="form-group">
                        <input type="text"
                               name="trans_meta[{{ $language->country->locale }}][trans]"
                               value="{{ empty($node->trans_key)? old("trans_meta[".$language->country->locale."][trans]") : Trans::face($node->trans_key, $language->country->locale) }}"
                               id="trans_key" class="form-control">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="toolbar">
        <div class="pull-right">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                {{ empty($node) ? 'Create' : 'Update' }}
            </button>
            <a href="{{ Admin::route('languageManager.translate.index') }}" role="button" class="btn btn-primary">
                <i class="fa fa-undo" aria-hidden="true"></i>
                Cancel
            </a>
        </div>
    </div>
</form>