<form method="POST"
      action="{{ ($model != "") ? Admin::route('contentManager.tag.update',['post'=>$model->term_id]) : Admin::route('contentManager.tag.store') }}">
    {{ csrf_field() }}
    @if($model != "")
        <input name="_method" type="hidden" value="PUT">
@endif
<!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        @foreach(Trans::languages() as $key => $language)
            <li role="presentation" class="{{ (Trans::locale() == $language->country->locale) ? 'active': '' }}">
                <a href="#{{ "language_{$language->country->locale}" }}" role="tab"
                   aria-controls="{{ "language_{$language->country->locale}" }}"
                   data-toggle="tab">{{ $language->name }}</a>
            </li>
        @endforeach
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        @foreach(Trans::languages() as $key => $language)
            <div role="tabpanel" class="tab-pane {{ (Trans::locale() == $language->country->locale) ? 'active': '' }}"
                 id="{{ "language_{$language->country->locale}" }}">
                <div class="form-group">
                    <label for="name-tag">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control"
                           value="{{ ($model != "" ) ? $model->getTranslation($language->country->locale)->name : old("trans.{$language->country->locale}.name") }}"
                           name="trans[{{$language->country->locale}}][name]"
                           id="name-tag" placeholder="Name Tag">
                </div>
                <div class="form-group">
                    <label for="desctiption-tag">Description</label>
                    <textarea class="form-control" name="trans[{{$language->country->locale}}][description]"
                              rows="3">{{ ($model != "" ) ? $model->getTranslation($language->country->locale)->description : old("trans.{$language->country->locale}.description") }}</textarea>
                </div>
            </div>
        @endforeach

        <div class="form-group">
            <label for="slug-tag">Slug</label>
            <input type="text" class="form-control" value="{{ ($model != "" ) ? $model->slug : old('slug') }}"
                   name="slug"
                   id="slug-category" placeholder="Slug Tag">
        </div>
        <div class="tools">
            <div class="pull-right">
                @if($model != "")
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Save
                    </button>
                    <a href="{{ Admin::route('contentManager.category.index') }}" class="btn btn-primary">
                        <i class="fa fa-undo" aria-hidden="true"></i>
                        Cancel
                    </a>
                @else
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Create
                    </button>
                @endif
            </div>
        </div>
</form>
