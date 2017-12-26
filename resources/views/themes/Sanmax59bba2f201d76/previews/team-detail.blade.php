@extends("themes.{$folder}.preview")

@section('title')
Team detail page
@endsection

@section('content')
<div class="content">
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-9">
                <section class="team-detail">
                    <div class="member-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <figure>
                                    <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                                </figure>
                            </div>
                            <div class="col-sm-6">
                                <header>
                                    <h4>Dr. Anna Doe</h4>
                                    <p>Sample Position</p>
                                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="member-info">
                        <h5>Info</h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        <h5>Experience</h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        <h5>Contact</h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    </div>
                </section>
                <!--End Member Detail-->
            </div>
            <div class="col-md-3">
                <!--Begin Sidebar Right-->
                <aside class="sidebar-right sb-team-detail">
                    <h3 class="sidebar-title">
                        Recommended  doctors
                    </h3>

                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div class="make-appointment">
                                <figure>
                                    <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                                </figure>
                                <header>
                                    <h4>Dr. Anna Doe</h4>
                                    <p>Sample Position</p>
                                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                                </header>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-4">
                            <div class="make-appointment">
                                <figure>
                                    <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                                </figure>
                                <header>
                                    <h4>Dr. Anna Doe</h4>
                                    <p>Sample Position</p>
                                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                                </header>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-4">
                            <div class="make-appointment">
                                <figure>
                                    <img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt="">
                                </figure>
                                <header>
                                    <h4>Dr. Anna Doe</h4>
                                    <p>Sample Position</p>
                                    <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                                </header>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-seemore hidden-sm">See more</a>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection