@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create new key</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                        @include('LanguageManager::partials.message_alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                        <p class="help-block">To create new key, please input all the fields below.</p>
                    </div>
                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                        @include('LanguageManager::translate.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@include('ContentManager::post.partials.scriptform')
@endpush