@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Create tag</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          @include('ContentManager::partials.alert')
          @include('ContentManager::tag.partials.form')
        </div>
      </div>
    </div>
  </div>
@endsection

@section('back')
  <a href="{{ Admin::route('contentManager.tag.index') }}">
    <strong>
      <i class="fa fa-angle-left" aria-hidden="true"></i>
      Back
    </strong>
  </a>
@endsection

@push('scripts')
@include('ContentManager::partials.scriptdelete')
@endpush