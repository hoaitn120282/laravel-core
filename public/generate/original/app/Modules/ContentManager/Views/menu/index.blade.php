<?php

$languages = Trans::languages();
?>
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" class="btn-block"
                               data-toggle="collapse"
                               data-parent="#accordion" href="#coll-page"
                               aria-expanded="true" aria-controls="collapseOne">
                                Page
                            </a>
                        </h4>
                    </div>
                    <div id="coll-page" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <ul id="menupage-container" class="list-unstyled category-list-scroll">
                                <li id="page-0">
                                    <div class="checkbox">
                                        <label>
                                            <?php
                                            $home = [];
                                            foreach ($languages as $language) {
                                                $home[$language->country->locale] = "Home";
                                            }
                                            ?>
                                            <input class="pagemenu" data-url=""
                                                   data-type="home"
                                                   value="{{ json_encode($home) }}" type="checkbox"> Home
                                        </label>
                                    </div>
                                </li>
                                <li id="page-0">
                                    <div class="checkbox">
                                        <label>
                                            <?php
                                            $blog = [];
                                            foreach ($languages as $language) {
                                                $blog[$language->country->locale] = "Blog";
                                            }
                                            ?>
                                            <input class="pagemenu" data-url="blog"
                                                   data-type="home"
                                                   value="{{ json_encode($blog) }}" type="checkbox"> Blog
                                        </label>
                                    </div>
                                </li>
                                @foreach($page as $node)
                                    <li id="page-{{ $node->id }}">
                                        <div class="checkbox">
                                            <label>
                                                <?php
                                                $value = [];
                                                foreach ($languages as $language) {
                                                    $value[$language->country->locale] = $node->getTranslation($language->country->locale)->post_title;
                                                }
                                                ?>
                                                <input class="pagemenu" data-url="{{ $node->post_name }}"
                                                       data-type="page"
                                                       value="{{ json_encode($value) }}"
                                                       type="checkbox"> {{ $node->post_title }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="pull-right">
                                <button data-role="menucat" data-class="pagemenu" class="btn btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add Menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.page -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#coll-category" aria-expanded="false" aria-controls="collapseTwo">
                                Categories
                            </a>
                        </h4>
                    </div>
                    <div id="coll-category" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <ul id="parent-0" class="list-unstyled category-list-scroll">
                                @foreach($category as $node)
                                    @if(count($node->children()) > 0 )
                                        @include('ContentManager::menu.partials.categorymenu', ['datas' => $node->children(),'post'=>false])
                                    @endif
                                @endforeach
                            </ul>
                            <div class="pull-right">
                                <button data-role="menucat" data-type="category"
                                        data-class="catmenu"
                                        class="btn btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add Menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.categories -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#coll-post" aria-expanded="false" aria-controls="collapseThree">
                                Posts
                            </a>
                        </h4>
                    </div>
                    <div id="coll-post" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <ul id="menupage-container" class="list-unstyled category-list-scroll">
                                @foreach($post as $node)
                                    <li id="page-{{ $node->id }}">
                                        <div class="checkbox">
                                            <label>
                                                <?php
                                                $value = [];
                                                foreach ($languages as $language) {
                                                    $value[$language->country->locale] = $node->getTranslation($language->country->locale)->post_title;
                                                }
                                                ?>
                                                <input name="catname[]" class="postmenu"
                                                       data-url="{{ $node->post_name }}" data-type="post"
                                                       value="{{ json_encode($value) }}"
                                                       type="checkbox"> {{ $node->post_title }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="pull-right">
                                <button data-role="menucat" data-class="postmenu" class="btn btn-block btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add Menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.posts -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#coll-custom" aria-expanded="false" aria-controls="collapseThree">
                                Custom Menu
                            </a>
                        </h4>
                    </div>
                    <div id="coll-custom" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="label-custom">label</label>
                                <input id="label-custom" type="text" class="form-control" placeholder="Label Menu">
                            </div>
                            <div class="form-group">
                                <label for="url-custom">URL</label>
                                <input id="url-custom" type="text" class="form-control" placeholder="Label Menu">
                            </div>
                            <div class="pull-right">
                                <button data-role="addmenu" data-type="custom" class="btn btn-block btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add Menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.custom-menu -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <div class="panel-title">
                            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#coll-location" aria-expanded="false" aria-controls="collapseFive">
                                Menu location
                            </a>
                        </div>
                    </div>
                    <div id="coll-location" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingFive">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="theme-group-name">Menu Location Theme</label>
                                <select id="theme-group-name" class="form-control">
                                    <option value="">Select Menu</option>
                                    @foreach($themeMenu as $tm)
                                        <option {{ $tm->meta_value == $groupActive ? "selected" : "" }} value="{{$tm->meta_key}}">{{ ucwords(str_replace("-", " ", $tm->meta_key)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!-- /.menu-location -->
            </div><!-- /.add-menu-group -->
            <div class="pull-right">
                <button id="save-menu" class="form-group btn btn-success">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                </button>
            </div>
        </div><!-- /.col-left -->

        <div class="col-md-8">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="group-name">Name</label>
                                <select id="group-name" class="form-control">
                                    @foreach($groupName as $grname)
                                        <option {{ $grname == $groupActive ? "selected" : "" }} value="{{$grname}}">{{ ucwords(str_replace("-", " ", $grname)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ Admin::route('contentManager.menu.addgroup') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-inline  pull-right">
                                <div class="form-group">
                                    <label for="name-menu-create">Menu Name </label>
                                    <input type="text" name="name_group" class="form-control" id="name-menu-create">
                                </div>
                                <button type="submit" class="form-group btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
            <div class="tab-content sortables">
                @foreach(Trans::languages() as $key => $language)
                    <div role="tabpanel" class="tab-pane {{ (Trans::locale() == $language->country->locale) ? 'active': '' }}"
                         id="{{ "language_{$language->country->locale}" }}">
                        <ol id="con-menu" class="sortable" style="padding-left:0;background:#eee">
                            @foreach($model as $node)
                                @include('ContentManager::menu.partials.listmenu', ['datas' => $node->children()])
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            </div>


        </div><!-- /.col-right -->
    </div>

@endsection

@push('style-top')
<link rel="stylesheet" href="{{ url('/assets/jquery.ui') }}/jquery-ui.css"/>
<style type="text/css">
    .placeholder {
        outline: 1px dashed #4183C4;
    }

    ol.sortable, ol.sortable ol {
        list-style-type: none;
    }

    .sortable li div {

        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
        cursor: move;
        border-color: #fff;
        margin: 0;

    }

    #con-menu {
        min-height: 300px;
    }

    #con-menu .panel-heading {
        position: relative;
    }

    #con-menu .panel-heading a {
        color: #fff;
        position: absolute;
        right: 10px;
    }

    #con-menu .panel-heading a:first-child {
        right: 30px;
    }
</style>
@endpush


@push('scripts')
<script src="{{ url('/assets/jquery.ui') }}/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ url('/assets/js') }}/jquery.mjs.nestedSortable.js"></script>
<script>
    $().ready(function () {
        var ns = $('ol.sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: 'div',
            helper: 'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            isTree: true,
            expandOnHover: 700,
            startCollapsed: true
        });

        $("input[data-uset='url']").change(function () {
            idPar = $(this).data("idpar");
            $("." + idPar).children('div').data("url", $(this).val());
        });

        $("input[data-uset='label']").change(function () {
            var idPar = $(this).data("idpar");
            var locale = $(this).data("locale");
            var elmLabel = $("." + idPar).children('div');
            var label = elmLabel.data("label");
            label[locale] = $(this).val();
            $("." + idPar).children('div').data("label", label);
        });

        // Toggle menu
        $("a[data-role='toggle-menu']").on("click", function () {
            var target = "." + $(this).data('target');
            $(target).toggle();
            return false;
        });

        $("#save-menu").on("click", function () {
            var te = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
            var tm = $('#theme-group-name').val();
            var group = $("#group-name").val();
            console.log(te);
            $.ajax({
            type: 'POST',
            url: "{{ Admin::route('contentManager.menu.update') }}",
            data: {"_token": "{{ csrf_token() }}", "datamenu": te, "thememenu": tm, "group": group}
            })
            .done(function () {
             location.reload();
            });
        });

        // Add custom menu to menu
        $("button[data-role='addmenu']").on("click", function () {
            var t = $(this).data("type");
            var label = $("#label-" + t).val();
            var url = $("#url-" + t).val();
            var group = $("#group-name").val();
            $.ajax({
                type: 'POST',
                url: "{{ Admin::route('contentManager.menu.store') }}",
                data: {"_token": "{{ csrf_token() }}", "label": label, "url": url, "type": "custom", "group": group}
            })
                    .done(function (result) {
                        location.reload();
                    });
            return false;
        });

        // Add category to menu
        $("button[data-role='menucat']").on("click", function () {
            var array = new Array();
            var cls = $(this).data("class");
            var group = $("#group-name").val();
            $("input:checkbox[class=" + cls + "]:checked").each(function () {
                array.push({label: JSON.parse($(this).val()), url: $(this).data("url"), type: $(this).data("type")});
            });
            console.log(array);
            $.ajax({
                type: 'POST',
                url: "{{ Admin::route('contentManager.menu.storemulti') }}",
                data: {"_token": "{{ csrf_token() }}", "datamenu": array, "group": group}
            })
                    .done(function (result) {
                        console.log(result);
                        console.log(result.length);
                        for (var i = 0; i < result.length; i++) {
                            generateLiMenu(result[i].id, result[i].label, result[i].url);
                        }
                        ;
                        location.reload();
                    });
            return false;
        });

        // Delete menu
        $('.deleteMenu').click(function () {
            var id = $(this).attr('data-id');
            var url = "{{ Admin::route('contentManager.menu.destroy',['id'=>'']) }}";
            $.ajax({
                type: 'DELETE',
                url: url + "/" + id,
                data: {"_token": "{{ csrf_token() }}"}
            })
                    .done(function (result) {
                        location.reload();
                    });
            return false;
        });

        $("#group-name").on("change", function () {
            window.location.href = '{{ url("/")."/".Admin::StrUrl("contentManager/menu") }}/' + $(this).val();
        });

        function generateLiMenu(id, label, url) {
            var str = "<li id='menuItem_" + id + "'>";
            str += "<div class='panel panel-primary' data-label='" + label + "' data-url='" + url + "'>";
            str += "<div class='panel-heading'>" + label + "<a data-target='body-" + id + "' data-role='toggle-menu' href='#'><i class='fa fa-chevron-down'></i></a><a href='#'><i class='fa fa-times'></i></a></div>";
            str += "<div id='body-" + id + "' class='panel-body'><div class='form-group'><label for='label-" + id + "'>Label</label><input data-uset='url' value='" + label + "'' data-idpar='" + id + "' type='text' class='form-control' id='label-" + id + "' placeholder='Label'>";
            str += "</div></div></div></li>";
            return str;
        }

        function createLiOpen(id) {
            return "<li id=" + id + ">";
        }

        function createLiClose() {
            return "</li>";
        }
    });
</script>
@endpush
