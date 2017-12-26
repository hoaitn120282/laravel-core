@extends('layouts.admin')

@section('content')
    <form method="POST"
          action="{{ Admin::route('languageManager.language.edit',['id'=>$current_language->language_id]) }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit language</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-0">
                        <div class="row">
                            @include('ContentManager::partials.errormessage')
                        </div>
                        <div class="row">
                            {{--Name--}}
                            <div class="form-group">
                                <label for="title-post">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$current_language->name}}">
                            </div>
                            {{--Country--}}
                            <div class="form-group">
                                <label for="title-post">Country</label>
                                <div>
                                    <select name="countries" id="countries" style="width:100%; height: 30px">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_id }}"
                                                    @if($country->country_id == $current_language->country_id)
                                                    selected="selected"
                                                    @endif
                                            >{{ $country->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
@include('ContentManager::post.partials.scriptform')
@endpush