@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit category</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('ContentManager::partials.alert')
                    @include('ContentManager::category.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@include('ContentManager::partials.scriptdelete')
@endpush