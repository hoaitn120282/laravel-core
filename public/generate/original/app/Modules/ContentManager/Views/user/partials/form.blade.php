<form method="POST"
      action="{{ ($model != "") ? Admin::route('contentManager.user.update',['user'=>$model->id]) : Admin::route('contentManager.user.store') }}">
    <div class="col-md-4">
        @include('ContentManager::partials.imageUpload',['dataID'=>'userPhoto','dataValue'=>($model != "" ) ? $model->photo : old('photo'),'dataName'=>'photo'])
    </div>
    <div class="col-md-8">
        {{ csrf_field() }}
        @if($model != "")
            <input name="_method" type="hidden" value="PUT">
        @endif
        <div class="form-group">
            <label for="name-user">Name *</label>
            <input type="text" class="form-control" value="{{ ($model != "" ) ? $model->name : old('name') }}"
                   name="name" id="name-tag" placeholder="Name User">
        </div>
        <div class="form-group">
            <label for="email-user">Email *</label>
            <input type="text" class="form-control" value="{{ ($model != "" ) ? $model->email : old('email') }}"
                   name="email" id="email-user" placeholder="Email User">
        </div>
        <div class="form-group">
            <label for="desctiption-user">Description</label>
            <textarea class="form-control" name="description"
                      rows="3">{{ ($model != "" ) ? $model->description : old('description') }}</textarea>
        </div>
        <div class="form-group">
            {!! Form::label('Role', 'Role:') !!}
            <select name="roleuser" class="form-control" >
                <option value="0">Select role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            </select>
        </div>
        @if($model == "")
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password">
            </div>
        @else
            <div>
                <a href="" data-toggle="modal" data-target="#myModal">
                    <button class="btn btn-default">Change password</button>
                </a>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Change password</h2>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="password" class="control-label">Old Password</label>
                                    <input id="passwordold" type="password" class="form-control" name="passwordold">
                                    <label for="password" class="control-label">New Password</label>
                                    <input id="passwordnew" type="password" class="form-control" name="passwordnew">
                                    <label for="password" class="control-label">Confirm New Password</label>
                                    <input id="passwordconfirm" type="password" class="form-control" name="passwordcomfirm">
                                    <input type="hidden" id="userid" value="{{ $model->id }}"></input>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a  data-role="save-pass">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                                </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        @if($model == "")
            <button type="submit" class="btn btn-default">Create</button>
        @else
            <button type="submit" class="btn btn-default">Save</button>
        @endif
    </div>
</form>


@push('scripts')
<script>
    $( document ).ready(function() {
        $("a[data-role='save-pass']").on("click", function () {
            var passwordold = $('#passwordold').val();
            var passwordnew = $('#passwordnew').val();
            var passwordconfirm = $('#passwordconfirm').val();
            var userid = $('#userid').val();

            swal({
                title: "Are you sure?",
                text: "",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                confirmButtonClass: "btn-success",
                cancelButtonText: "No"
            }, function () {
                $.ajax({
                    type: 'POST',
                    url: "{{ Admin::route('change-password') }}",
                    data: {
                        "passwordold": passwordold,
                        "passwordnew": passwordnew,
                        "passwordconfirm": passwordconfirm,
                        "userid": userid,
                        "_token": "{{ csrf_token() }}"
                    }
                })
                .done(function() {
                    swal("", "Change password successfully", "success");
                    $('#myModal').modal('hide');
                });
            });
            return false;
        });
    });
</script>
@endpush