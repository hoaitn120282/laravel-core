<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="make-appointment">
            <figure>
                <img src="{{ $options['avatar'] }}" alt="{{ $options['name'] }}" title="{{ $options['name'] }}">
            </figure>
            <header>
                <h4>{{ $options['name'] }}</h4>
                <div>{!! $options['description'] !!}</div>
                <a href="{{ $options['make_appointment'] }}" class="btn btn-make-appointment">{{ Trans::face('make_appointment') }}</a>
            </header>
        </div>
    </div>
</div>