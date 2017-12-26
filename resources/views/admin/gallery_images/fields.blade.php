<div class="row">
    <div class="col-md-9">
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
                <div role="tabpanel"
                     class="tab-pane {{ (Trans::locale() == $language->country->locale) ? 'active': '' }}"
                     id="{{ "language_{$language->country->locale}" }}">

                    <!-- Image Title Field -->
                    <div class="form-group">
                        <label for="{{$language->country->locale}}_image_title">Image Title</label>
                        <input type="text"
                               name="trans[{{ $language->country->locale }}][image_title]"
                               value="{{ (!empty($node)) ?
                                   $node->getTranslation($language->country->locale)->image_title :
                                   old("trans.{$language->country->locale}.image_title") }}"
                               class="form-control" id="{{ $language->country->locale }}_image_title">
                    </div>

                    <!-- Image Description Field -->
                    <div class="form-group">
                        <label for="{{$language->country->locale}}_image_description">Image Description</label>
                        <textarea name="trans[{{ $language->country->locale }}][image_description]"
                                  id="{{$language->country->locale}}_image_description"
                                  class="form-control" rows="5">{{ ($node != "" ) ?
                                   $node->getTranslation($language->country->locale)->image_description :
                                   old("trans.{$language->country->locale}.image_description") }}</textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Attach Link Field -->
        <div class="form-group">
            <label for="image_link">Attach Link</label>
            <input type="text" name="image_link" value="{{ $node->image_link or old('image_link') }}"
                   class="form-control">
        </div>
    </div><!-- /.col-main -->

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Image status</div>
            <div class="panel-body">
                <select name="image_status" id="image_status" class="form-control">
                    <option value="1" {{ (isset($node['image_status']) && 1 == $node['image_status']) ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="0" {{ (isset($node['image_status']) && 0 == $node['image_status']) ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>
        </div><!-- /.status -->

        <div class="panel panel-default">
            <div class="panel-heading">Gallery</div>
            <div class="panel-body">
                <select name="gallery_id" id="gallery_id" class="form-control">
                    @if($galleries)
                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}"
                                    {{ (!empty($node) && ($node->gallery_id == $gallery->id)) ? 'selected' : '' }}>{{ $gallery->gallery_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div><!-- /.gallery -->

        <div class="panel panel-default">
            <div class="panel-heading">Select image</div>
            <div class="panel-body">
                {!! Form::file('image_name', null, ['class' => 'form-control']) !!}
                @if(isset($node))
                    <img width="200"
                         src="/uploads/gallery/{{$node->gallery_id}}/{{$node->image_name}}">
                @endif
            </div>
        </div>

    </div><!-- /.col-sidebar -->
</div>

<!-- .toolbar -->
<div class="toolbar-action">
    {{ csrf_field() }}
    <div class="pull-right">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
            <a href="{!! route('admin.galleryImages.index') !!}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</div>
