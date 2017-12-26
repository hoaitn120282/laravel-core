    <?php
    $filename = url( $node->image_preview);

    $file_headers = get_headers($filename);
    if ($file_headers[0] == 'HTTP/1.0 404 Not Found') {
        $previewImg = url('/themes') . '/no-image.png';
    } else if ($file_headers[0] == 'HTTP/1.0 302 Found' && $file_headers[7] == 'HTTP/1.0 404 Not Found') {
        $previewImg = url('/themes') . '/no-image.png';
    } else {
        $previewImg = $filename;
    }

    ?>
<div class="col-lg-4 col-md-6 cold-sm-6">
    <div class="thumbnail theme-item theme-item-{{$node->id}}">

        <div class="wrap-theme">
            <div class="image view-{{$node->id}} background-image" style="background-image: url('{{$previewImg}}')">
                <a href="{{Admin::route('templateManager.create',['id'=>$node->id])}}">
                    <button type="button" class="btn btn-success btn-md btn-block btn-create-new">
                        <i class="fa fa-upload"></i> Create new
                    </button>
                </a>
            </div>
            <div class="caption"><strong>{{$node->name}}</strong></div>
            <div class="action">
                <a href="{{ Admin::route('templateManager.preview', ['id' => $node->id]) }}" target="_blank" title="View" class="btn btn-success">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
            <div class="checkbox-action">
                <input type="checkbox" id="template-{{$node->id}}" value="{{$node->id}}"
                       <?php
                            if(in_array($node->id, $selected)) {
                              echo 'checked';
                            }
                       ?>
                       name="vehicle" class="regular-checkbox big-checkbox checkbox-input">
                <label for="template-{{$node->id}}"></label>
            </div>
        </div>

    </div>
</div>
