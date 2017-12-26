@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('ContentManager::partials.alert')
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create category</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('ContentManager::category.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('back')
    <a href="{{ Admin::route('contentManager.category.index') }}">
        <strong>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back
        </strong>
    </a>
@endsection

@push('scripts')
@include('ContentManager::partials.scriptdelete')
@endpush