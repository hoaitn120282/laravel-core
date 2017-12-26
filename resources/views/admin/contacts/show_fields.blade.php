
<div class="site-detail">
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Contact detail</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_panel">
                <!-- Id Field -->
                <div class="form-group">
                    {!! Form::label('id', 'Id:') !!}
                    <p>{!! $contact->id !!}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    <p>{!! $contact->name !!}</p>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    <p>{!! $contact->email !!}</p>
                </div>

                <!-- Message Field -->
                <div class="form-group">
                    {!! Form::label('message', 'Message:') !!}
                    <p>{!! $contact->message !!}</p>
                </div>

                <!-- Created At Field -->
                <div class="form-group">
                    {!! Form::label('created_at', 'Created At:') !!}
                    <p>{!! $contact->created_at !!}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group">
                    {!! Form::label('updated_at', 'Updated At:') !!}
                    <p>{!! $contact->updated_at !!}</p>
                </div>

                <!-- Deleted At Field -->
                <div class="form-group">
                    {!! Form::label('deleted_at', 'Deleted At:') !!}
                    <p>{!! $contact->deleted_at !!}</p>
                </div>

                <div class="toolbar-actions text-right">
                    <a href="{!! route('admin.contacts.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
