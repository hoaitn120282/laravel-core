<form method="POST"
      action="{{ ($model != "") ? Admin::route('contentManager.page.update',['page'=>$model->id]) : Admin::route('contentManager.page.store') }}" style="margin-bottom: 70px;">
    <div class="row">
        <div class="col-md-9">
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
                            <label for="title-post">Page Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"
                                   name="trans[{{$language->country->locale}}][post_title]"
                                   value="{{ ($model != "" ) ?
                                   $model->getTranslation($language->country->locale)->post_title :
                                   old("trans.{$language->country->locale}.post_title") }}"
                                   id="title-post"
                                   placeholder="Page Title">
                            @if($model != "")
                                <p class="help-block">
                                    <strong>Permalink : </strong>
                                    <span id="slug-permalink">{{ url("{$language->country->locale}/{$model->post_name}.html") }}</span>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="content-post">Content <span class="text-danger">*</span></label>
                            <textarea name="trans[{{$language->country->locale}}][post_content]"
                                      data-locale="{{$language->country->locale}}"
                                      data-modal="{{ "summer_{$language->country->locale}_image" }}"
                                      id="{{ "summer_{$language->country->locale}_image" }}"
                                      class="content-post-{{$language->country->locale}} content-post form-control"
                                      rows="18">{{ ($model != "" ) ?
                                      $model->getTranslation($language->country->locale)->post_content :
                                      old("trans.{$language->country->locale}.post_content") }}</textarea>
                            <!-- /.Insert image -->
                            @include('ContentManager::partials.summernote.img_upload', [
                                'data' => [
                                    'name' => "summer_{$language->country->locale}_image"
                                ]
                            ])

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="col-md-3" style="">
            <div class="panel panel-default">
                <div class="panel-heading">Publish</div>
                <div class="panel-body">
                    <select name="status" class="form-control">
                        <option {{ (!empty($model) && $model->post_status == "publish") ? "selected" : "" }} value="publish">
                            Publish
                        </option>
                        <option {{ (!empty($model) && $model->post_status == "Draft") ? "selected" : "" }} value="Draft">Draft
                        </option>
                    </select>
                </div>
            </div><!-- /.publish -->

            <div class="panel panel-default">
                <div class="panel-heading">Layout</div>
                <div class="panel-body">
                    <select name="meta[layout]" class="form-control">
                        <option value="">Use default layout for page</option>
                        @foreach($layouts as $key => $value)
                            @if (empty($model))
                                <option value="{{ $key }}">
                                    {{ ucwords(str_replace("-", " ", $value)) }}
                                </option>
                            @else
                                <option value="{{ $key }}"
                                        {{ ($key == $model->getMetaValue('layout')) ? 'selected':'' }}>
                                    {{ ucwords(str_replace("-", " ", $value)) }}
                                </option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div><!-- /.layout -->

            <div class="panel panel-default">
                <div class="panel-heading">Featured Image</div>
                <div class="panel-body">
                    @include('ContentManager::partials.x_form.btn_upload', [
                            'idModal'=>'modal_featuredImage',
                            'model' => ($model != "" ? $model->getMetaValue('featured_img') : ''),
                            'label' => '',
                            'input'=>'meta[featured_img]'
                    ])
                </div>
            </div><!-- /.feature-image -->
        </div>
    </div>
    <div class="row">
        <div class="toolbar-actions">
            <div class="pull-right">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    {{ ($model == "" ) ? 'Create' : 'Update' }}
                </button>
                <a href="{{ Admin::route('contentManager.page.index') }}"
                   role="button" class="btn btn-primary">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                    Cancel
                </a>
            </div>
        </div>
    </div>
</form>
@push('style-top')
<style>
    .toolbar-actions {
        margin-top: 15px;
        padding: 15px 35px 15px 15px;
        overflow: hidden;
        position: fixed;
        width: 100%;
        bottom: 36px;
        z-index: 9999;
        left: 0;
    }
</style>
@endpush
