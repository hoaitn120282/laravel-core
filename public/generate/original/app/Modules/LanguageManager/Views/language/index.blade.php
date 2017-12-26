@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Manager Language</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a id="btn-sel-del" style="display:none;" href="#" class="btn-toolbox danger"><i class="fa fa-trash"></i> Delete Selected language</a></li>
                    <li><a href="{{ Admin::route('languageManager.language.create') }}" class="btn-toolbox success"><i class="fa fa-plus"></i> Add New Language</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12">
                    @include('LanguageManager::partials.message_alert')
                </div>
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr>
                            <th class="icheck"><input id="checkAll" type="checkbox" class="flat"></th>
                            <th>Name</th>
                            <th>Country</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($model as $data)
                        <tr id="tr-{{ $data->language_id }}">
                            <td class="icheck">
                                <input type="checkbox" class="flat" name="checkbox" data-role="checkbox" value="{{$data->language_id}}" />
                                <input type="hidden" id="idLanguage" value="{{ $data->language_id }}">
                            </td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->country->name}}</td>
                            <td class="action">
                                <a href="{{ Admin::route('languageManager.language.edit',['post'=>$data->language_id]) }}" class="text-success">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                <a href="#" data-role="delete-post" data-idlanguage="{{ $data->language_id }}" class="text-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $model->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $( document ).ready(function() {
        $("a[data-role='delete-post']").on( "click", function() {
            var idlanguage = $(this).data('idlanguage');
            console.log(idlanguage);
            swal({
                title: "Are you sure to delete this language?",
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
                    url: "{{ Admin::route('languageManager.language.destroy',['language'=>'']) }}/"+idlanguage,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                    .done(function() {
                        location.reload();
                    });
            });
            return false;
        });

        $("#checkAll").change(function () {
            $("input:checkbox[name=checkbox]").prop('checked', $(this).prop("checked"));
            if($("#btn-sel-del").css('display') == 'none'){
                $("#btn-sel-del").css("display","inline-block");
            }else{
                $("#btn-sel-del").css("display","none");
            }
        });

        $( "input[type=checkbox]" ).on( "change", function () {
            var n = $( "input:checked[name=checkbox]" ).length;
            if(n == 0){
                $("#btn-sel-del").css("display","none");
            }else{
                $("#btn-sel-del").css("display","inline-block");
            }
        });

        $("#btn-sel-del").on("click",function(){
            var array = new Array();
            $("input:checkbox[name=checkbox]:checked").each(function(){
                array.push($(this).val());
            });
            var id = array.join()
            swal({
                title: "Are you sure to delete the selected language?",
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
                    url: "{{ Admin::route('languageManager.language.destroy',['language'=>'']) }}/"+id,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                    .done(function() {
                        location.reload();
                    });
            });
            return false;
        });
    });
</script>
@endpush
