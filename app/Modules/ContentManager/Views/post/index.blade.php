@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Post Manager</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a id="btn-sel-del" style="display:none;" href="#" class="btn-toolbox danger"><i
                                    class="fa fa-trash"></i> Delete Selected post</a></li>
                    <li><a href="{{ Admin::route('contentManager.post.create') }}" class="btn-toolbox success"><i
                                    class="fa fa-plus"></i> Create post</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('ContentManager::partials.alert')
                <table class="table table-striped table-bordered jambo_table bulk_action">
                    <thead>
                    <tr>
                        <th><input id="checkAll" type="checkbox" class="flat"></th>
                        <th>Post Title</th>
                        <th>Categories</th>
                        <th>Tags</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Created date</th>
                        {{--<th>Feature post</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($model as $data)
                        <tr id="tr-{{ $data->id }}">
                            <td>
                                <input type="checkbox" class="flat" name="checkbox" data-role="checkbox"
                                       value="{{$data->id}}"/>
                                <input type="hidden" id="idPost" value="{{ $data->id }}">
                            </td>
                            <td>{{$data->post_title}}</td>
                            <td>{!! Helper::taxonomyLink($data->categories,false) !!}</td>
                            <td>{!! Helper::taxonomyLink($data->tags,false) !!}</td>
                            <td>{{$data->user->name}}</td>
                            <td>{{ ('publish' == $data->post_status) ? 'Publish' : 'Draft' }}</td>
                            <td>{{$data->updated_at->format("M dS, Y")}}</td>
                            {{--<td>--}}
                                {{--@if($data->getMetaValue('featured_post') == 'on')--}}
                                    {{--<span class="label label-primary">Featured</span>--}}
                                    {{--@else--}}
                                    {{--<span class="label label-danger">No Featured</span>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            <td class="action">
                                <a href="{{ Admin::route('contentManager.post.edit',['page'=>$data->id]) }}"
                                   class="text-success">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a> |
                                <a href="#" data-role="delete-post" data-idpost="{{ $data->id }}" data-url="{{ Admin::route('contentManager.post.destroy', ['id'=>$data->id]) }}"
                                   class="text-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="toll">
                    <div class="pull-right">
                        {{ $model->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("a[data-role='delete-post']").on("click", function () {
            var idpost = $(this).data('idpost');
            var url = $(this).data('url');
            swal({
                title: "Are you sure to delete the selected post?",
                text: "",
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
                    url: url,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
                            location.reload();
//                            swal("Deleted!", "Delete Success", "success");
//                            $("#tr-" + idpost).remove();
                        });
            });
            return false;
        });

        $("#checkAll").change(function () {
            $("input:checkbox[name=checkbox]").prop('checked', $(this).prop("checked"));
            if ($("#btn-sel-del").css('display') == 'none') {
                $("#btn-sel-del").css("display", "inline-block");
            } else {
                $("#btn-sel-del").css("display", "none");
            }
        });

        $("input[type=checkbox]").on("change", function () {
            var n = $("input:checked[name=checkbox]").length;
            if (n == 0) {
                $("#btn-sel-del").css("display", "none");
            } else {
                $("#btn-sel-del").css("display", "inline-block");
            }
        });

        $("#btn-sel-del").on("click", function () {
            var array = new Array();
            $("input:checkbox[name=checkbox]:checked").each(function () {
                array.push($(this).val());
            });
            var id = array.join()
            swal({
                title: "Are you sure to delete the selected post?",
                text: "",
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
                    url: "{{ Admin::route('contentManager.post.destroy',['post'=>'']) }}/" + id,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
                            location.reload();
                        });
            });
            return false;
        });
    });
</script>
@endpush
