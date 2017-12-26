<table class="table table-responsive table-striped jambo_table bulk_action"" id="contacts-table">
    <thead>
        <th>No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Phone</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php  $i = 0; ?>
    @foreach($contacts as $contact)
        <?php $i++;?>
        <tr id="tr-{{ $contact->id }}">
            <td>{!! $i !!}</td>
            <td>{!! $contact->name !!}</td>
            <td>{!! $contact->email !!}</td>
            <td>{!! $contact->message !!}</td>
            <td>{!! $contact->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-role="delete-contact" data-contactid="{{ $contact->id }}">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

