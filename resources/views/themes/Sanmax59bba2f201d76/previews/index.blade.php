@extends("themes.{$folder}.preview")

@section('title')
Home page
@endsection

@section('content')
    <div class="content">
        <section class="our-doctors">
            <div class="container">
                <h3 class="article-title"><span>Our doctors</span></h3>
                <div class="row">
                    <div class="col-sm-4">
                        <article class="doctor-detail text-center">
                            <figure>
                                <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt=""></a>
                            </figure>
                            <h4>Dr. Anna Doe</h4>
                            <p>Sample Position</p>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="doctor-detail text-center">
                            <figure>
                                <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt=""></a>
                            </figure>
                            <h4>Dr. Anna Doe</h4>
                            <p>Sample Position</p>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="doctor-detail text-center">
                            <figure>
                                <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/doctor-1.jpg") }}" alt=""></a>
                            </figure>
                            <h4>Dr. Anna Doe</h4>
                            <p>Sample Position</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!--End Our Doctors-->

        <section class="news">
            <div class="container">
                <h3 class="article-title"><span>News</span></h3>
                <div class="row">
                    <div class="col-sm-4">
                        <article class="new-detail">
                            <figure>
                                <a href=""><img src="{{ URL::to("/themes/{$folder}/images/new-1.jpg") }}" alt=""></a>
                            </figure>
                            <div class="new-content">
                                <h3>Sample Title</h3>
                                <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                            </div>
                            <a href="#" class="btn btn-readmore pull-right">Read more</a>

                            <div class="new-date">
                                <p class="month">Jan</p>
                                <p class="date">01</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-sm-4">
                        <article class="new-detail">
                            <figure>
                                <a href=""><img src="{{ URL::to("/themes/{$folder}/images/new-1.jpg") }}" alt=""></a>
                            </figure>
                            <div class="new-content">
                                <h3>Sample Title</h3>
                                <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                            </div>
                            <a href="#" class="btn btn-readmore pull-right">Read more</a>

                            <div class="new-date">
                                <p class="month">Jan</p>
                                <p class="date">01</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-sm-4">
                        <article class="new-detail">
                            <figure>
                                <a href=""><img src="{{ URL::to("/themes/{$folder}/images/new-1.jpg") }}" alt=""></a>
                            </figure>
                            <div class="new-content">
                                <h3>Sample Title</h3>
                                <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                            </div>
                            <a href="#" class="btn btn-readmore pull-right">Read more</a>
                            <div class="new-date">
                                <p class="month">Jan</p>
                                <p class="date">01</p>
                            </div>
                        </article>
                    </div>
                </div>
                <p class="text-center"><a href="#" class="btn btn-make-appointment">see more news</a>
                </p>
            </div>
        </section>
        <!--End News-->

        <section class="tips">
            <div class="container">
                <h3 class="article-title"><span>Tips</span></h3>

                <div class="tips-slide owl-carousel owl-theme">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="tip-detail">
                                <div class="tip-content">
                                    <h3>Sample Tip</h3>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
jQuery.fn.exists = function(){return this.length>0;};
jQuery(document).ready(function($) {

    $('.header-slide').owlCarousel({
        items: 1,
        nav: true,
        navText: ["<img src='{{ Theme::asset('images/icon/icon-prev.png') }}'>","<img src='{{ Theme::asset('images/icon/icon-next.png') }}'>"],
    });
});
</script>
@endpush