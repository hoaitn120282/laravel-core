@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gallery Images</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('adminlte-templates::common.errors')
                <div class="row">
                    <div class="col-md-12">
                        @include('adminlte-templates::common.errors')
                    </div>
                    <form action="{{ Admin::route('galleryImages.store') }}"
                          method="post"
                          enctype="multipart/form-data"
                          class="form">
                    @include('admin.gallery_images.fields')
                    </form>
                </div>
            </div>
        </div>
@endsection
