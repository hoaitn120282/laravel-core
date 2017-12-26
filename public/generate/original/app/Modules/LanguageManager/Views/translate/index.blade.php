@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Translation</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a id="btn-sel-del" style="display:none;" href="#" class="btn-toolbox danger">
                            <i class="fa fa-trash"></i> Delete Selected translation</a>
                    </li>
                    <li>
                        <a href="{{ Admin::route('languageManager.translate.create') }}" class="btn-toolbox success">
                            <i class="fa fa-plus"></i> Add New Translation</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12">
                    @include('LanguageManager::partials.message_alert')
                </div>
                <table class="table table-striped table-bordered jambo_table bulk_action">
                    <thead>
                    <tr>
                        <th rowspan="2" class="icheck vcenter"><input id="checkAll" type="checkbox" class="flat"></th>
                        <th rowspan="2" class="vcenter">Key</th>
                        <th colspan="{{ count($languages) }}" class="text-center">Translate</th>
                        <th rowspan="2" class="action vcenter">Action</th>
                    </tr>
                    <tr>
                        @foreach($languages as $language)
                            <th>{{ $language->name }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($nodes as $node)
                        <tr id="tr-{{ $node->id }}">
                            <td>
                                <input type="checkbox" class="flat" name="checkbox" data-role="checkbox"
                                       value="{{$node->id}}"/>
                                <input type="hidden" id="idLanguage" value="{{ $node->id }}">
                            </td>
                            <td>{{ $node->trans_key }}</td>
                            @foreach($languages as $language)
                                <td>{{ Trans::face($node->trans_key, $language->country->locale) }}</td>
                            @endforeach
                            <td class="action">
                                <a href="{{ Admin::route('languageManager.translate.edit',['post'=>$node->id]) }}"
                                   class="text-success">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a> |
                                <a href="#" data-role="delete-trans"
                                   data-id="{{ $node->id }}"
                                   data-url="{{ Admin::route('languageManager.translate.destroy', ['id'=>$node->id]) }}"
                                   class="text-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="tool">
                    <div class="pull-right">{{ $nodes->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("a[data-role='delete-trans']").on("click", function () {
            var id_trans = $(this).data('id');
            var url_trans = $(this).data('url');
            swal({
                title: "Are you sure to delete this translation?",
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
                    url: url_trans,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
                            location.reload();
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
            var id = array.join();
            swal({
                title: "Are you sure to delete the selected translation?",
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
                    url: "{{ Admin::route('languageManager.translate.destroy',['id'=>'']) }}/" + id,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                        .done(function () {
//                            swal("Deleted!", "Delete Success", "success");
                            location.reload();
                        });
            });
            return false;
        });
    });
</script>
@endpush
