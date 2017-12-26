@extends("themes.{$folder}.preview")

@section('title')
More page
@endsection

@section('content')
<div class="content">
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <section class="site-content">
                    <figure>
                        <img src="{{ URL::to("/themes/{$folder}/images/content-img.jpg") }}" />
                    </figure>

                    <div class="ct-detail">
                        <h3>Example Title</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection