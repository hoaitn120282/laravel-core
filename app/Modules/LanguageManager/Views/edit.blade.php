@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ Admin::route('languageManager.edit',['id'=>$current_language->language_id]) }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="row">
            <div class="col-md-12">
                @include('ContentManager::partials.errormessage')
            </div>
            <div class="col-md-6 col-md-offset-3 col-sm-offset-0">
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
    </form>
@endsection

@push('scripts')
@include('ContentManager::post.partials.scriptform')
@endpush