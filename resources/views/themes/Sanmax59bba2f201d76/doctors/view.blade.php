@extends(Theme::active().'.main')

@section('content')
    <div class="container bg-white">
        <section class="team-list">
            <div class="row">
                @if(count($nodes)>0)
                    @foreach($nodes as $node)
                        <div class="col-md-3 col-sm-4">
                            <div class="team-member">
                                <a href="{{ Theme::route('doctor.show', ['slug' => $node->post_name]) }}">
                                    <figure>
                                        <img src="{{ $node->getMetaValue('featured_img') }}"
                                             alt="{{ $node->post_title }}" title="{{ $node->post_title }}">
                                    </figure>
                                    <header>
                                        <h4>{{ $node->post_title }}</h4>
                                        <p>{!! $node->getExcerpt(10) !!}</p>
                                    </header>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!--End New Detail-->
    </div>
@endsection

@section('appTitle')
    {{ $appTitle or '' }}
@endsection