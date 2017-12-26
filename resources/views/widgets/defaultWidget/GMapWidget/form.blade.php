<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input id="title" value="{{ $options['title'] }}" class="form-control" type="text" name="title">
</div>

<div class="form-group">
    <label for="api-key" class="control-label">API key</label>
    <input id="api-key" value="{{ $options['api_key'] }}" class="form-control" type="text" name="api_key">
</div>

<a class="btn btn-block btn-primary"
   role="button"
   data-toggle="collapse"
   href="#collapseAdvance{{ $options['baseID'] }}"
   aria-expanded="false"
   aria-controls="collapseAdvance{{ $options['baseID'] }}"
   style="margin-top: 10px;text-align: left;">
    Advance settings
    <i class="pull-right fa fa-angle-down" aria-hidden="true"></i>
</a>
<div class="collapse" id="collapseAdvance{{ $options['baseID'] }}">
    <div class="form-group">
        <label for="zoom" class="control-label">Zoom</label>
        <select name="zoom" class="form-control" id="zoom">
            @for($i = 3; $i <= 14; $i++)
                <option value="{{$i}}" {{ ($i == $options['zoom']) ? 'selected':'' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="latitude" class="control-label">Latitude</label>
        <input id="latitude" value="{{ $options['latitude'] }}" class="form-control" type="text" name="latitude">
    </div>
    <div class="form-group">
        <label for="longitude" class="control-label">Longitude</label>
        <input id="longitude" value="{{ $options['longitude'] }}" class="form-control" type="text" name="longitude">
    </div>
    <div class="form-group">
        <label for="width" class="control-label">Width</label>
        <input id="width" value="{{ $options['width'] }}" class="form-control" type="text" name="width">
    </div>
    <div class="form-group">
        <label for="height" class="control-label">Height</label>
        <input id="height" value="{{ $options['height'] }}" class="form-control" type="text" name="height">
    </div>
</div>