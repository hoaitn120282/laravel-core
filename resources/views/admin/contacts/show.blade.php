@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.contacts.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection