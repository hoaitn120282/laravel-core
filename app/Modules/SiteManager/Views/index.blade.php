@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Site Manager</h2>
                <div class="box-filter">
                    {{--<span class="filter-title">Template Type</span>--}}
                    <select name="theme_tyoe" id="themeType" class="form-control"
                            onchange="window.location = this.options[this.selectedIndex].value;">
                        <option value="{{Admin::route('siteManager.index',['theme_type_id'=>0, 'status'=>$status])}}">All Template</option>
                        <option value="{{Admin::route('siteManager.index',['theme_type_id'=>1, 'status'=>$status])}}" <?php if ($theme_type_id == 1) echo 'selected'; ?>>
                            Simple Template
                        </option>
                        <option value="{{Admin::route('siteManager.index',['theme_type_id'=>2, 'status'=>$status])}}" <?php if ($theme_type_id == 2) echo 'selected'; ?>>
                            Medium Template
                        </option>
                    </select>
                </div>
                <div class="box-filter">
                    {{--<span class="filter-title">Status</span>--}}
                    <select name="theme_tyoe" id="themeType" class="form-control"
                            onchange="window.location = this.options[this.selectedIndex].value;">
                        <option value="{{Admin::route('siteManager.index',['theme_type_id'=> $theme_type_id, 'status'=> -1 ])}}">All Status</option>
                        <option value="{{Admin::route('siteManager.index',['theme_type_id'=> $theme_type_id, 'status'=> 0 ])}}" <?php if ($status == 0) echo 'selected'; ?>>
                            Pending
                        </option>
                        <option value="{{Admin::route('siteManager.index',['theme_type_id'=> $theme_type_id, 'status'=> 1])}}" <?php if ($status == 1) echo 'selected'; ?>>
                            Running
                        </option>
                    </select>
                </div>
                <div class="box-filter">
                    <form class="form-horizontal"  method="get">
                        <input type="text" name="q" placeholder="Search by name" value="{{$query}}" id="searchContent">
                        <button type="submit" class="btn btn-success btn-search"> <i class="fa  fa-search"></i> Search</button>
                    </form>
                </div>
                <ul class="nav navbar-right panel_toolbox">
                    {{--<li><a href="{{ Admin::route('siteManager.compress') }}" class="btn-toolbox success">Demo compress</a></li>--}}
                    <li><a href="{{ Admin::route('siteManager.select-template') }}" class="btn-toolbox success"><i class="fa fa-plus"></i> Create New</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('ContentManager::partials.alert')
                @if(count($clinics) > 0)
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Site Name</th>
                        <th>Admin Name</th>
                        <th>Created date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                    @foreach ($clinics as $data)
                        <?php $i++;?>
                        <tr id="tr-{{ $data->clinic_id }}">
                            <td>
                                {{--<input type="checkbox" class="flat" name="checkbox" data-role="checkbox" value="{{$data->clinic_id}}" />--}}
                                <span>{{$i}}</span>
                                <input type="hidden" id="idLanguage" value="{{ $data->clinic_id }}">
                            </td>
                            <td>
                                <div class="site-name">
                                    <a href="{{ Admin::route('siteManager.preview', ['id' => $data->clinic_id]) }}">
                                        {{$data->info->site_name}}
                                    </a>

                                </div>
                            </td>
                            <td>{{$data->info->username}}</td>
                            <td>{{ date('F j, Y',strtotime($data->created_at)) }}</td>
                            <td>
                                {{$data->is_publish == 1? 'Running' : 'Pending'}}
                            </td>
                            <td class="action-site" style="width: 200px">
                                @if(count($data->theme)>0)
                                <a target="_blank" href="{{ Admin::route('templateManager.preview', ['id' => $data->theme[0]->theme_id]) }}" data-toggle="tooltip" title="Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                @endif
                                <a href="{{ Admin::route('siteManager.edit-info', ['id' => $data->clinic_id]) }}" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="#" data-role="delete-post" data-clinicid="{{ $data->clinic_id }}" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                 {{$clinics->appends(['q' => $query])->links()}}
                @else
                    <h2>No site site is available. Please create new one.</h2>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $( document ).ready(function() {
        $("a[data-role='delete-post']").on( "click", function() {
            var clinicid = $(this).data('clinicid');
            swal({
                title: "",
                text: "Are you sure to delete this site information?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: true,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                confirmButtonClass: "btn-danger",
                cancelButtonText: "No",
            }, function () {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ Admin::route('siteManager.destroy',['clinicid'=>'']) }}/"+clinicid,
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
