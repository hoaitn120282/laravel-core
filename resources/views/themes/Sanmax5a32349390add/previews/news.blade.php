@extends("themes.{$folder}.preview")

@section('title')
News page
@endsection

@section('content')
<div class="content">
    <section class="news news-page">
        <div class="container bg-white">
            <div class="row">
                <div class="col-sm-12">
                    <article class="new-detail">
                        <figure class="col-md-3 col-sm-5">
                            <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/new-page-1.jpg") }}" alt=""></a>
                        </figure>
                        <div class="new-content col-md-9 col-sm-7">
                            <h3>Sample Title</h3>
                            <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        </div>
                        <a href="?page=news-detail" class="btn btn-readmore pull-right">Read more</a>
                        <div class="new-date">
                            <p class="month">Jan</p>
                            <p class="date">01</p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12">
                    <article class="new-detail">
                        <figure class="col-md-3 col-sm-5">
                            <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/new-page-1.jpg") }}" alt=""></a>
                        </figure>
                        <div class="new-content col-md-9 col-sm-7">
                            <h3>Sample Title</h3>
                            <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        </div>
                        <a href="?page=news-detail" class="btn btn-readmore pull-right">Read more</a>
                        <div class="new-date">
                            <p class="month">Jan</p>
                            <p class="date">01</p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12">
                    <article class="new-detail">
                        <figure class="col-md-3 col-sm-5">
                            <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/new-page-1.jpg") }}" alt=""></a>
                        </figure>
                        <div class="new-content col-md-9 col-sm-7">
                            <h3>Sample Title</h3>
                            <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        </div>
                        <a href="?page=news-detail" class="btn btn-readmore pull-right">Read more</a>
                        <div class="new-date">
                            <p class="month">Jan</p>
                            <p class="date">01</p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12">
                    <article class="new-detail">
                        <figure class="col-md-3 col-sm-5">
                            <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/new-page-1.jpg") }}" alt=""></a>
                        </figure>
                        <div class="new-content col-md-9 col-sm-7">
                            <h3>Sample Title</h3>
                            <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        </div>
                        <a href="?page=news-detail" class="btn btn-readmore pull-right">Read more</a>
                        <div class="new-date">
                            <p class="month">Jan</p>
                            <p class="date">01</p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12">
                    <article class="new-detail">
                        <figure class="col-md-3 col-sm-5">
                            <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/new-page-1.jpg") }}" alt=""></a>
                        </figure>
                        <div class="new-content col-md-9 col-sm-7">
                            <h3>Sample Title</h3>
                            <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        </div>
                        <a href="?page=news-detail" class="btn btn-readmore pull-right">Read more</a>
                        <div class="new-date">
                            <p class="month">Jan</p>
                            <p class="date">01</p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12">
                    <article class="new-detail">
                        <figure class="col-md-3 col-sm-5">
                            <a href="#"><img src="{{ URL::to("/themes/{$folder}/images/new-page-1.jpg") }}" alt=""></a>
                        </figure>
                        <div class="new-content col-md-9 col-sm-7">
                            <h3>Sample Title</h3>
                            <i>Posted on Monday, Feb 18 2017 at 7:00 AM</i>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        </div>
                        <a href="?page=news-detail" class="btn btn-readmore pull-right">Read more</a>
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
</div>
@endsection