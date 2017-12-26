<table class="table table-striped jambo_table bulk_action">
    <thead>
    <tr>
        <th><input id="checkAll" type="checkbox" class="flat"></th>
        <th>
            No.
        </th>
        <th>Name</th>
        <th>Role</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php  $i = 0; ?>
    @foreach ($model as $data)
        <?php $i++;?>
        <tr id="tr-{{ $data->id }}">
            <td>
                <input type="checkbox" class="flat" name="checkbox" data-role="checkbox" value="{{$data->id}}"/>
                <input type="hidden" id="idPost" value="{{ $data->id }}">
            </td>
            <td>
                <span>{{ (($model->currentPage() - 1) * ($model->perPage())) + $i }}</span>
            </td>
            <td>
                <div class="btn-edit-delete">
                    {{$data->name}}
                </div>
            </td>
            <td>
                {{ $data->roles->name }}
            </td>
            <td>
                {{$data->description}}
            </td>
            <td>
                <div class="btn-edit-delete">
                    <a href="{{ Admin::route('contentManager.user.edit',['user'=>$data->id]) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    @if($data->id != $userLogin->id)
                        |
                    <a href="#" data-role="delete-user" data-idpost="{{ $data->id }}"
                       data-url="{{ Admin::route('contentManager.user.destroy',['tag'=>'']) }}/"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $model->links() }}

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("a[data-role='delete-user']").on("click", function () {
            var idpost = $(this).data('idpost');
            var urlDelete = $(this).data('url');
            swal({
                title: "Are you sure?",
                text: "Delete this user.",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                confirmButtonClass: "btn-danger",
                cancelButtonText: "No"
            }, function () {
                $.ajax({
                    type: 'DELETE',
                    url: urlDelete + idpost,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                    .done(function () {
                        location.reload();
                    });
            });
        });
    });
</script>
@endpush