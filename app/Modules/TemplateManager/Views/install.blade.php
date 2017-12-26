@extends('layouts.admin')

@section('content')
    <div class="list-templates">
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Install new template</h2>
                    <div class="clearfix"></div>
                </div>
                @include('TemplateManager::components.alert')
                <div class="x_content">
                    <p class="help-block text-center">If you have a theme in a .zip format, you may install it by uploading it here.</p>
                    <form id="install_theme" name="install_theme"
                          action="{{ Admin::route('templateManager.install') }}"
                          enctype="multipart/form-data"
                          method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-ctrl" name="theme_zip" type="file">
                            <button class="btn btn-success" type="submit">Install Now</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Installed template</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('TemplateManager::components.x_list')
                </div>
            </div>
        </div>
    </div>


@endsection

@push('style-top')
<style>
    .list-templates .thumbnail {
        position: relative;
        overflow: hidden;
    }
    .list-templates .thumbnail .action {
        position: absolute;
        top: -25px;
        transform: translateY(-50%);
        font-size: 20px;
        width: 100%;
        text-align: center;
        transition: all 0.5s ease;
    }
    .list-templates .thumbnail:hover .action {
        top: 50%;
    }
    .list-templates .thumbnail .action a {
        padding: 0 8px;
        transition: all 0.3s ease;
    }
    .list-templates .thumbnail .action a:hover {
        color: #1ABB9C;
    }
    .list-templates .thumbnail .draft {
        transform: translateX(-23%) translateY(-23%) rotate(-36deg);
        margin: 0;
        background-color: #b91716;
        color: #fff;
        position: absolute;
        top: 0;
        left: 0;
        transform-origin: top right;
        font-size: 14px;
        padding: 3px 10px;
        z-index: 3;
    }

    .list-templates .thumbnail .draft:before,
    .list-templates .thumbnail .draft:after {
        content: '';
        position: absolute;
        top: 0;
        margin: 0 -1px;
        width: 100%;
        height: 100%;
        background-color: #b91716;
    }

    .list-templates .thumbnail .draft:before {
        left: 100%;
    }

    .list-templates .thumbnail .draft:after {
        right: 100%;
    }
</style>
@endpush