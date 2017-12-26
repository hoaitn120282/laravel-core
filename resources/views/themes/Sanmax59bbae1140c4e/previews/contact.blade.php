@extends("themes.{$folder}.preview")

@section('title')
Contact page
@endsection

@section('content')
<div class="container bg-white">
            <div class="row">
        
                <div class="">
                    <aside class="sidebar-left"></aside>
                </div>

                <div class="col-md-9 col-sm-12">
                    <section class="content-dt content-contact">
                        <div class="ct-detail">
                            <h3>Company Name</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>

                            <ul class="contact-info list-unstyled">
                                <li><span>Address</span> 123 Fake Street, Fake City, Fake Country</li>
                                <li><span>Phone number</span> +401 111 222 xxx</li>
                                <li><span>Email  address</span> companyname@support.com</li>
                                <li><span>Skype</span> companyname.skype</li>
                            </ul>

                            <div class="contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0405366193354!2d105.78919731545666!3d21.031063971852408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab31fa9089bd%3A0xab696ce4f403011!2sQSoft+Vietnam!5e0!3m2!1svi!2s!4v1487733047422" width="600" height="450" frameborder="0" style="border:0; width: 100%" allowfullscreen></iframe>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-3 col-sm-12">
                    <!--Begin Sidebar Right-->
                    <aside class="sidebar-right">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
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

                            <div class="col-md-12 col-sm-6">
                                <div class="make-appointment">
                                    <figure>
                                        <img src="{{ URL::to("/themes/{$folder}/images/doctor-2.jpg") }}" alt="">
                                    </figure>
                                    <header>
                                        <h4>Dr. Anna Doe</h4>
                                        <p>Sample Position</p>
                                        <a href="#" class="btn btn-make-appointment">MAKE APPOINTMENT</a>
                                    </header>
                                </div>
                            </div>  
                        </div>
                    </aside>
                    <!--Begin Sidebar Right-->
                </div>
            </div>
        </div>
@endsection