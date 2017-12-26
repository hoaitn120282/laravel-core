@extends("themes.{$folder}.preview")

@section('title')
Team page
@endsection

@section('content')
<div class="content">
    <div class="container bg-white">
        <section class="team-list">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="team-member">
                        <a href="?page=team-detail">
                            <figure>
                                <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                            </figure>
                            <header>
                                <h4>Dr. Anna Doe</h4>
                                <p>Sample Position</p>
                            </header>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="team-member">
                        <a href="?page=team-detail">
                            <figure>
                                <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                            </figure>
                            <header>
                                <h4>Dr. Anna Doe</h4>
                                <p>Sample Position</p>
                            </header>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="team-member">
                        <a href="?page=team-detail">
                            <figure>
                                <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                            </figure>
                            <header>
                                <h4>Dr. Anna Doe</h4>
                                <p>Sample Position</p>
                            </header>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="team-member">
                        <a href="?page=team-detail">
                            <figure>
                                <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                            </figure>
                            <header>
                                <h4>Dr. Anna Doe</h4>
                                <p>Sample Position</p>
                            </header>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="team-member">
                        <a href="?page=team-detail">
                            <figure>
                                <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                            </figure>
                            <header>
                                <h4>Dr. Anna Doe</h4>
                                <p>Sample Position</p>
                            </header>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="team-member">
                        <a href="?page=team-detail">
                            <figure>
                                <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                            </figure>
                            <header>
                                <h4>Dr. Anna Doe</h4>
                                <p>Sample Position</p>
                            </header>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <!--End New Detail-->
    </div>
</div>
@endsection