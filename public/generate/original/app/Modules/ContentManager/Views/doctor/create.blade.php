@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create doctor</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12">
                    @include('ContentManager::partials.alert')
                </div>
                @include('ContentManager::doctor.partials.form')
            </div>
        </div>
    </div>
@endsection

@section('back')
    <a href="{{ Admin::route('contentManager.doctor.index') }}">
        <strong>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back
        </strong>
    </a>
@endsection

@push('scripts')
@include('ContentManager::doctor.partials.scriptform')
@include('ContentManager::partials.summernote.x_summernote')
<script type="text/javascript">
    $(function () {
        $('#tags').tagsInput({
            autocomplete_url: 'http://myserver.com/api/autocomplete'
        });
    });
</script>
@endpush