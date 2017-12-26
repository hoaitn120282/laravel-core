@extends("themes.{$folder}.preview")

@section('title')
Contact page
@endsection

@section('content')
<div class="content content-contact">
    <div class="container">
        <section class="contact bg-white">
            <header>
                <h1>Company Name</h1>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,<br /> eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
            </header>
            <div class="contact-info">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="detail text-center">
                            <span><i class="fa fa-map-marker"></i></span>
                            <p class="type">Address</p>
                            <p class="type-dt mtop-5">123 Fake Street, Fake City,<br />
                                Fake Country</p>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="detail text-center">
                            <span><i class="fa fa-phone"></i></span>
                            <p class="type">Phone number</p>
                            <p class="type-dt">+401 111 222 xxx</p>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="detail text-center">
                            <span><i class="fa fa-envelope"></i></span>
                            <p class="type">Email address</p>
                            <p class="type-dt">companyname@support.com</p>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="detail text-center">
                            <span><i class="fa fa-skype"></i></span>
                            <p class="type">Skype</p>
                            <p class="type-dt">companyname.skype</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End New Detail-->
    </div>

    <section class="form-contact">
        <div class="contact">
            <div class="container container-ct-f">
                <div class="contact-form text-center">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h3>Sed ut perspiciatis unde omnis</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>

                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" id="email" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="phone-number">Phone number</label>
                                    <input type="text" class="form-control" id="phone-number" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-make-appointment">send message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0405366193354!2d105.78919731545666!3d21.031063971852408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab31fa9089bd%3A0xab696ce4f403011!2sQSoft+Vietnam!5e0!3m2!1svi!2s!4v1487733047422" width="600" height="450" frameborder="0" style="border:0; width: 100%" allowfullscreen></iframe>
    </div>
</div>
@endsection