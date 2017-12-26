@extends(Theme::active().'.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        @foreach($nodes as $data)
            <a href="{{ $data->getUrl() }}"><h1>{{ $data->post_title }}</h1></a>
            <div class="well well-sm">
                <span><i class="fa fa-clock-o"></i> {{ $data->updated_at->format('M d, Y') }}</span> | 
                <span><i class="fa fa-user"></i> {{ $data->user->name }}</span>
            </div>
            {!! $data->getExcerpt() !!}
        @endforeach
    </div>
</div>
@endsection
