<li class="widget-item" id="menuItem_{{ $widget->id }}">
    <div class="panel panel-primary">
        <div class="panel-heading">
            {{ $widget->getOptions("title") }}
            <a href="#" data-role="saveWidget" data-idwidget="{{ $widget->getOptions('baseID') }}">Save </a>
            <a data-target="body-{{ $widget->id }}" data-role='toggle-menu' href="#"><i class="fa fa-chevron-down"></i></a>
            <a class="delete-widget" data-url="{{ Admin::route('contentManager.widget.destroy',['id'=>$widget->id]) }}"
               href="#"><i class="fa fa-times"></i></a>
        </div>
        <div id="body-{{ $widget->id }}" class="panel-body" style="display: none;">
            <div id="{{ $widget->getOptions('baseID') }}" class="form-group">
                <input type="hidden" name="id" value="{{ $widget->id }}">
                <input type="hidden" name="baseID" value="{{ $widget->getOptions('baseID') }}">
                {!! Admin::widget($widget) !!}

                <div class="form-group">
                    <label for="visibility">Visibility on pages</label>
                    <textarea name="visibility" class="form-control" id="visibility" rows="3">{{ $widget->getOptions('visibility') }}</textarea>
                    <p class="help-block">Specify pages by using their paths. Enter one path per line. The '*' character is a wildcard. An example path is /doctor/* for every doctor page. <front> is the front page.</p>
                </div>
            </div>
        </div>
    </div>
</li>
