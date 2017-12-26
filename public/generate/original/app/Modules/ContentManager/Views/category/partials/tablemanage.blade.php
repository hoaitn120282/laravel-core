<div class="x_panel">
    <div class="x_title">
        <h2>Category Manager</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <a id="btn-sel-del" style="display:none;"
                   data-url="{{ Admin::route('contentManager.category.destroy',['category'=>'']) }}/"
                   href="#"
                   class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Delete Selected category
                </a>
            <li>
                <a href="{{ Admin::route('contentManager.category.create') }}" class="btn-toolbox success">
                    <i class="fa fa-plus"></i> Create Category</a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-striped table-bordered jambo_table bulk_action">
            <thead>
            <tr>
                <th class="icheck"><input id="checkAll" type="checkbox" class="flat"></th>
                <th>Name</th>
                <th>Description</th>
                <th>Slug</th>
                <th class="action">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($nodes as $data)
                <tr id="tr-{{ $data->term_id }}">
                    <td  class="icheck">
                        <input type="checkbox" name="checkbox" class="flat" data-role="checkbox"
                               value="{{$data->term_id}}"/>
                        <input type="hidden" id="idPost" value="{{ $data->term_id }}">
                    </td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->slug}}</td>
                    <td class="action">
                        <a href="{{ Admin::route('contentManager.category.edit',['post'=>$data->term_id]) }}" class="text-success">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> |
                        <a href="#" data-role="delete-post"
                           data-url="{{ Admin::route('contentManager.category.destroy',['category'=>'']) }}/"
                           data-idpost="{{ $data->term_id }}" class="text-danger">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="tools">
            <div class="pull-right">
                {{ $nodes->links() }}
            </div>
        </div>

    </div>
</div>