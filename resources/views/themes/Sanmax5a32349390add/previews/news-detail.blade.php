@extends("themes.{$folder}.preview")

@section('title')
Home page
@endsection

@section('content')
<div class="content">
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-8">
                <section class="news-page-detail">
                    <header>
                        <div class="new-date">
                            <p class="month">Jan</p>
                            <p class="date">01</p>
                        </div>
                        <div class="news-detail-title">
                            <h2>Sample Title</h2>
                            <p>Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                        </div>
                    </header>
                    <div class="news-text">
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                        </p>
                        <p>
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                        </p>
                        <figure>
                            <img src="{{ URL::to("/themes/{$folder}/images/news-detail.jpg") }}" alt="">
                        </figure>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                        </p>
                    </div>
                </section>
            </div>

            <div class="col-md-4">
                <!--Begin Sidebar Right-->
                <aside class="sidebar-right">
                    <h3>LATEST NEWS</h3>
                    <div class="news-item">
                        <div class="item-detail">
                            <div class="row">
                                <figure class="col-xs-4">
                                    <a href="#">
                                        <img class="media-object" src="{{ URL::to("/themes/{$folder}/images/news-item.jpg") }}" alt="...">
                                    </a>
                                </figure>
                                <div class="col-xs-8">
                                    <h4 class="title">Sample Title</h4>
                                    <p class="date">Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-item">
                        <div class="item-detail">
                            <div class="row">
                                <figure class="col-xs-4">
                                    <a href="#">
                                        <img class="media-object" src="{{ URL::to("/themes/{$folder}/images/news-item.jpg") }}" alt="...">
                                    </a>
                                </figure>
                                <div class="col-xs-8">
                                    <h4 class="title">Sample Title</h4>
                                    <p class="date">Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-item">
                        <div class="item-detail">
                            <div class="row">
                                <figure class="col-xs-4">
                                    <a href="#">
                                        <img class="media-object" src="{{ URL::to("/themes/{$folder}/images/news-item.jpg") }}" alt="...">
                                    </a>
                                </figure>
                                <div class="col-xs-8">
                                    <h4 class="title">Sample Title</h4>
                                    <p class="date">Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-item">
                        <div class="item-detail">
                            <div class="row">
                                <figure class="col-xs-4">
                                    <a href="#">
                                        <img class="media-object" src="{{ URL::to("/themes/{$folder}/images/news-item.jpg") }}" alt="...">
                                    </a>
                                </figure>
                                <div class="col-xs-8">
                                    <h4 class="title">Sample Title</h4>
                                    <p class="date">Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-item">
                        <div class="item-detail">
                            <div class="row">
                                <figure class="col-xs-4">
                                    <a href="#">
                                        <img class="media-object" src="{{ URL::to("/themes/{$folder}/images/news-item.jpg") }}" alt="...">
                                    </a>
                                </figure>
                                <div class="col-xs-8">
                                    <h4 class="title">Sample Title</h4>
                                    <p class="date">Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-item">
                        <div class="item-detail">
                            <div class="row">
                                <figure class="col-xs-4">
                                    <a href="#">
                                        <img class="media-object" src="{{ URL::to("/themes/{$folder}/images/news-item.jpg") }}" alt="...">
                                    </a>
                                </figure>
                                <div class="col-xs-8">
                                    <h4 class="title">Sample Title</h4>
                                    <p class="date">Posted on Monday, Feb 18 2017 at 7:00 AM</p>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--Begin Sidebar Right-->
            </div>
        </div>
        <!--End New Detail-->
    </div>
</div>
@endsection

@section('left-sidebar')
    @parent
    <!-- You can overwrite left-sidebar on master layout -->
@endsection

@section('right-sidebar')
    @parent
    <!-- You can overwrite right-sidebar on master layout -->
@endsection