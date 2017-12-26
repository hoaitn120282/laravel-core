@extends(Admin::theme())

@section('content')
    <div class="list-templates">
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Template Manager</h2>
                    <div class="box-filter">
                        <select name="theme_tyoe" id="themeType" class="form-control"
                                onchange="window.location = this.options[this.selectedIndex].value;">
                            <option value="{!! Request::fullUrlWithQuery(['theme_type' => null]) !!}">All Template</option>
                            <option value="{!! Request::fullUrlWithQuery(['theme_type' => 1]) !!}" <?php if ($themeType == 1) echo 'selected'; ?>>
                                Simple Template
                            </option>
                            <option value="{!! Request::fullUrlWithQuery(['theme_type' => 2]) !!}" <?php if ($themeType == 2) echo 'selected'; ?>>
                                Medium Template
                            </option>
                        </select>
                    </div><!-- /.theme-type -->

                    <div class="box-filter">

                        <select name="theme_tyoe" id="themeType" class="form-control"
                                onchange="window.location = this.options[this.selectedIndex].value;">
                            <option value="{!! Request::fullUrlWithQuery(['publish' => null]) !!}">All status</option>
                            <option value="{!! Request::fullUrlWithQuery(['publish' => 1]) !!}" {{ (isset($isPublish) && ($isPublish == 1)) ? 'selected' :'' }}>
                                Published Template
                            </option>

                            <option value="{!! Request::fullUrlWithQuery(['publish' => 0]) !!}" {{ (isset($isPublish) && ($isPublish == 0)) ? 'selected' :'' }}>
                                Draft Template
                            </option>
                        </select>
                    </div><!-- /.status -->

                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a href="{{ Admin::route('templateManager.install') }}">
                                <button type="button" class="btn btn-block btn-success"><i
                                            class="fa fa-cloud-upload"></i> &nbsp;Install Theme
                                </button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('TemplateManager::components.alert')
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

    .list-templates .thumbnail:after {
        content: '';
        display: block;
        background-color: #000;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .list-templates .thumbnail:hover::after {
        opacity: 0.5;
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

    .list-templates .thumbnail .action {
        position: absolute;
        top: -25px;
        transform: translateY(-50%);
        font-size: 20px;
        width: 100%;
        text-align: center;
        transition: all 0.5s ease;
        z-index: 1;
    }

    .list-templates .thumbnail:hover .action {
        top: 50%;
    }

    .list-templates .thumbnail .action a {
        color: #ffffff;
        padding: 0 8px;
        transition: all 0.3s ease;
    }

    .list-templates .thumbnail .action a:hover {
        color: #1ABB9C;
    }
</style>
@endpush