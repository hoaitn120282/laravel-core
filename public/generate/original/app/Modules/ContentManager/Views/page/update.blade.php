@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit page</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12">
                    @include('ContentManager::partials.errormessage')
                </div>
                @include('ContentManager::page.partials.form')
            </div>
        </div>
    </div>

@endsection

@section('back')
    <a href="{{ Admin::route('contentManager.page.index') }}">
        <strong>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back
        </strong>
    </a>
@endsection

@section('style-top')
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/tag-autocomplate/bootstrap-tagsinput.css">
@endsection

@push('scripts')
@include('ContentManager::partials.summernote.x_summernote')
@endpush