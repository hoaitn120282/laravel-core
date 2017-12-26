@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create post</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12">
                    @include('ContentManager::partials.errormessage')
                </div>
                @include('ContentManager::post.partials.form')
            </div>
        </div>
    </div>
@endsection

@section('back')
    <a href="{{ Admin::route('contentManager.post.index') }}">
        <strong>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back
        </strong>
    </a>
@endsection

@push('scripts')
@include('ContentManager::post.partials.scriptform')
@include('ContentManager::partials.summernote.x_summernote')
<script type="text/javascript">
    $(function () {
        $('#tags').tagsInput({
            autocomplete_url: 'http://myserver.com/api/autocomplete'
        });
    });
</script>
@endpush