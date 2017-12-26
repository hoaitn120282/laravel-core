@extends(Theme::active().'.main')

@section('content')
    <section class="team-detail">
        <div class="member-header">
            <div class="row">
                @if(!empty($model->getMetaValue('featured_img')))
                    <div class="col-sm-6">
                        <figure>
                            <img src="{{ $model->getMetaValue('featured_img') }}"
                                 alt="{{ $model->post_title }}"
                                 title="{{ $model->post_title }}">
                        </figure>
                    </div>
                @endif
                <div class="col-sm-6">
                    <header>
                        <h4>{{ $model->post_title }}</h4>
                        <p>Sample Position</p>
                        <a href="{{ $model->getMetaValue('appointment_link') }}"
                           class="btn btn-make-appointment">{{ Trans::face('make_appointment') }}</a>
                    </header>
                </div>
            </div>
        </div>

        <div class="member-info">{!!html_entity_decode($model->post_content)!!}</div>
    </section>
@endsection

@section('appTitle')
    {{ $appTitle or $model->post_title }}
@endsection