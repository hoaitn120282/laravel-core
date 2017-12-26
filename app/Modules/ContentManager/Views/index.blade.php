@extends(Admin::theme())

@section('content')
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="{{ Admin::route('siteManager.index') }}">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-file-o"></i></div>
                    <div class="count">{{ $sites }}</div>
                    <h3>Sites</h3>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="{{ Admin::route('templateManager.index') }}">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-columns"></i></div>
                    <div class="count">{{ $templates }}</div>
                    <h3>Templates</h3>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="{{ url('admin/contentManager/user') }}">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">{{ $users->total() }}</div>
                    <h3>Active Users</h3>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Admin activities</h2>
                <div class="box-filter pull-right">
                    <form class="form-horizontal"  method="get">
                        <input type="text" name="q" value="{{$q}}" placeholder="Search by admin name" id="searchContent">
                        <button type="submit" class="btn btn-success btn-search"> <i class="fa  fa-search"></i> Search</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if(count($users) > 0)
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Admin name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Latest activity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $i = 0; ?>
                        @foreach ($users as $user)
                            <?php $i++;?>
                            @if($user->meta->first()['meta_value'] != "")
                                <tr id="tr-{{ $user->id }}">
                                    <td>
                                        <span>{{$i}}</span>
                                    </td>
                                    <td>
                                        <a href="{{ Admin::route('contentManager.user.log', ['id' => $user->id, 'userName'=>$user->name]) }}">{{ $user->name }}</a>
                                    </td>
                                    <td>
                                        {{$user->meta->first()['created_at']->format('l, M d, Y') }}
                                    </td>
                                    <td>
                                        {{$user->meta->first()['created_at']->format('h:i:s') }}
                                    </td>
                                    <td>
                                        {{ Admin::userLogSerial($user->meta->first()['meta_value'] ,'desc')   }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->appends(['q' => $q])->links()}}
                @else
                    <h2>No site site is available. Please create new one.</h2>
                @endif
            </div>
        </div>
    </div>
@endsection