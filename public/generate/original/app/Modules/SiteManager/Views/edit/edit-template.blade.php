@extends('layouts.admin')

@section('back')
    <a href="{{ \URL::previous() }}">
        <strong> <i class="fa fa-arrow-left"></i> &nbsp; Back</strong>
    </a>
@endsection

@section('content')
    <div class="row step-1-create-site">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit site</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="top-content row">
                    <div class="col-md-6">
                        <h3>Please select at least 1 template!</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="box-filter col-md-6">
                                <select name="theme_tyoe" id="themeType" class="form-control"
                                        onchange="window.location = this.options[this.selectedIndex].value;">
                                    @if(!$query)
                                        <option value="{{Admin::route('siteManage.update-template',['id'=>$id,'theme_type'=>0])}}">All Template</option>
                                        <option value="{{Admin::route('siteManage.update-template',['id'=>$id,'theme_type'=>1])}}" <?php if ($theme_type == 1) echo 'selected'; ?>>
                                            Simple Template
                                        </option>
                                        <option value="{{Admin::route('siteManage.update-template',['id'=>$id,'theme_type'=>2])}}" <?php if ($theme_type == 2) echo 'selected'; ?>>
                                            Medium Template
                                        </option>
                                    @else
                                        <option value="{{Admin::route('siteManage.update-template',['id'=>$id,'theme_type'=>0]).'/?q='.$query}}">All Template</option>
                                        <option value="{{Admin::route('siteManage.update-template',['id'=>$id,'theme_type'=>1]).'/?q='.$query}}" <?php if ($theme_type == 1) echo 'selected'; ?>>
                                            Simple Template
                                        </option>
                                        <option value="{{Admin::route('siteManage.update-template',['id'=>$id,'theme_type'=>2]).'/?q='.$query}}" <?php if ($theme_type == 2) echo 'selected'; ?>>
                                            Medium Template
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <div class="box-search col-md-6">
                                <form class="form-horizontal"  method="get">
                                    <input type="text" name="q" placeholder="Search by name" value="{{$query}}" id="searchContent">
                                    <button type="submit" class="btn btn-success btn-search"> <i class="fa  fa-search"></i> Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--end.top-content--}}
                <div class="main-content">
                    <div class="row">
                        @if(count($templatesUpdate) > 0)
                            @foreach($templatesUpdate as $template)
                                @include('SiteManager::partials.template-block',['node'=> $template])
                            @endforeach
                        @else
                            @include('SiteManager::partials.no-result',['message'=>'No result is found!'])
                        @endif
                    </div>
                    {{ $templatesUpdate->links() }}
                </div>
                {{--end.main-content--}}
                <div class="step-bottom row">
                    <div class="col-md-12">
                        <a href="{{ Admin::route('siteManager.edit-info',['id' => $id]) }}">
                            <button class="btn btn-success pull-right">Cancel</button>
                        </a>
                        <a href="{{ Admin::route('siteManager.save-template',['id' => $id]) }}">
                            <button class="btn btn-success pull-right">Update</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $('.checkbox-input').on('change', function() {

        if (this.checked) {
            console.log('check roi '+this.value);

        }else{
            console.log('chua check '+this.value);
        }
        $.ajax({
            type: 'POST',
            url: "{{ Admin::route('siteManager.update-template-id') }}/"+this.value,
            data: {"_token": "{{ csrf_token() }}"}
        })
            .done(function() {
//                    swal("Deleted!", "Delete Success", "success");
//                    location.reload();
            });
    });
</script>
@endpush
