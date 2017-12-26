<table class="table table-responsive" id="galleries-table">
    <thead>
    <th>Gallery Name</th>
    <th>Creator</th>
    <th>Created date</th>
    <th>Status</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($galleries as $gallery)
        <tr>
            <td>{!! $gallery->gallery_name !!}</td>
            <td>{!! $gallery->author->name !!}</td>
            <td>{!! $gallery->created_at->format('M dS, Y') !!}</td>
            <td>{!! (($gallery->gallery_status == true)? '<span class="label label-success">Active</span>':'<span class="label label-danger">Inactive</span>') !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.galleries.edit', [$gallery->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    <a href=""
                       data-role='delete-post'
                       data-url="{{ Admin::route('galleries.destroy', ['id' => $gallery->id]) }}"
                       class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>