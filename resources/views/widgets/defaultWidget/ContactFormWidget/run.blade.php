<section class="form-contact">
    <div class="contact">
        <div class="container container-ct-f">
            <div class="contact-form text-center">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h3>{{ $options['title'] }}</h3>
                        <p>{{ $options['description'] }}</p>
                        <!-- .message success -->

                        @if(!empty(session('success')))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                {{ session('success') }}
                            </div>
                        @endif
                    <!-- /.message success -->
                        <form action="{{ route('contacts.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">{{ Trans::face('Name') }}</label>
                                <input type="text" class="form-control" id="name"
                                       name="name" value="{{ old('name') }}" placeholder="">
                                @if(count($errors->get('name')) > 0)
                                    <ul class="text-danger list-unstyled">
                                        @foreach($errors->get('name') as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{ Trans::face('Email_address') }}</label>
                                <input type="text" class="form-control" id="email"
                                       name="email" value="{{ old('email') }}" placeholder="">
                                @if(count($errors->get('email')) > 0)
                                    <ul class="text-danger list-unstyled">
                                        @foreach($errors->get('email') as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone-number">{{ Trans::face('Phone_number') }}</label>
                                <input type="text" class="form-control" id="phone-number"
                                       name="phone" value="{{ old('phone') }}" placeholder="">
                                @if(count($errors->get('phone')) > 0)
                                    <ul class="text-danger list-unstyled">
                                        @foreach($errors->get('phone') as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ Trans::face('Message') }}</label>
                                <textarea class="form-control" rows="4" name="message">{{ old('message') }}</textarea>
                                @if(count($errors->get('message')) > 0)
                                    <ul class="text-danger list-unstyled">
                                        @foreach($errors->get('message') as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <button type="submit"
                                    class="btn btn-make-appointment">{{ Trans::face('send_message') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
