@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gallery Imagesr</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        @include('adminlte-templates::common.errors')
                    </div>
                    <form action="{{ Admin::route('galleryImages.update', ['id' => $node->id]) }}"
                          method="post"
                          enctype="multipart/form-data"
                          class="form">
                        <input type="hidden" name="_method" value="patch">
                        @include('admin.gallery_images.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection