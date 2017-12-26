@foreach($models as $node)
    <?php

    $filename = url($node->image_preview);
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
                </div>
                <div class="action">
                    <ul>
                        <li>
                            <a href="{{ Admin::route('templateManager.preview', ['id' => $node->id]) }}" target="_blank">
                                <i class="fa fa-eye"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Admin::route('contentManager.theme.view', ['id' => $node->id]) }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </li>
                        @if(!$node->status)
                            <li>
                                <a href="#"
                                   data-role="uninstall-theme"
                                   data-theme_id="{{$node->id}}"
                                   data-url="{{ Admin::route('contentManager.theme.uninstall', ['id' => $node->id]) }}">
                                    <i class="fa fa-times"></i></a>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="caption">
                <ul class="list-inline">
                    <li class="pull-left"><strong class="theme-name">{{ $node->name }}</strong></li>
                    <li class="pull-right">
                        @if($node->status)
                            <strong class="btn btn-disabled btn-sm">Activated</strong>
                        @else
                            <a href="{{ Admin::route('contentManager.theme.active',['id'=>$node->id]) }}"
                               class="btn btn-success btn-sm">Active Theme</a>
                        @endif
                    </li>
                    <div class="clearfix"></div>
                    </ul>

            </div>
        </div>
    </div>
@endforeach

@push('scripts')
@include('ContentManager::theme.partials.script_uninstall')
@endpush