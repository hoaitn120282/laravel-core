@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Site Manager</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a id="btn-sel-del" style="display:none;" href="#" class="btn-toolbox danger"><i class="fa fa-trash"></i>Create new site</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h2>Edit site</h2>
                <form class="form-horizontal"  method="post" action="{{ Admin::route('siteManager.edit-info', ['id' => $site->clinic_id]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="information">
                        <h3 class="text-center create-title">Account Information</h3>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="site-name" class="col-sm-4 control-label">Site Name <span class="require">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="site-name" name="site-name" value="{{ $site->info->site_name }}" placeholder="Site Name">
                                        @if ($errors->has('site-name')) <p class="error-message">{{ $errors->first('site-name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 control-label">Language <span class="require">*</span></label>
                                    <div class="col-sm-8">
                                        @foreach($languages as $language)
                                            <label class="checkbox-inline">
                                                <input  id="{{ $language->language_id }}" name="language[]" type="checkbox"  value="{{ $language->language_id }}"

                                                <?php
                                                        if(in_array($language->language_id, $languageSelected)) echo "checked";
                                                 ?>

                                                 > {{ $language->name }}
                                            </label>
                                        @endforeach
                                        @if ($errors->has('language')) <p class="error-message">{{ $errors->first('language') }}</p> @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="information">
                                <h3 class="text-center create-title">Doctor Information</h3>

                                <div class="form-group">
                                    <label for="admin-name" class="col-sm-3 control-label">Admin Name <span class="require">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="admin-name" name="admin-name" value="{{ $site->info->username }}" placeholder="Admin Name">
                                        @if ($errors->has('admin-name')) <p class="error-message">{{ $errors->first('admin-name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email-address" class="col-sm-3 control-label">Email Address <span class="require">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email-address" name="email-address" value="{{ $site->info->email }}"  placeholder="Email Address">
                                        @if ($errors->has('email-address')) <p class="error-message">{{ $errors->first('email-address') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-3 control-label">Address <span class="require">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $site->info->address }}"  placeholder="Address">
                                        @if ($errors->has('address')) <p class="error-message">{{ $errors->first('address') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telephone" class="col-sm-3 control-label">Telephone <span class="require">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="telephone" name="telephone" value="{{ $site->info->telephone }}"  placeholder="Telephone">
                                        @if ($errors->has('telephone')) <p class="error-message">{{ $errors->first('telephone') }}</p> @endif
                                    </div>
                                </div>


                            </div>

                            <div class="doctor-infor">
                                <h3 class="text-center create-title">Selected Template</h3>
                                @foreach($site->theme as $theme)
                                    <div class="form-group">
                                        <label for="telephone" class="col-sm-3 control-label">Teamplate {{ $theme->clinic_theme_id }}</label>
                                        <div class="col-sm-9">
                                            <a class="btn btn-success" target="_blank" href="{{Admin::route('templateManager.preview',['id'=>$theme->theme_id])}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="telephone" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <a class="btn btn-success"  href="{{ Admin::route('siteManage.update-template',['id'=>$site->clinic_id]) }}" >
                                            Select Templates
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="information">
                                <h3 class="text-center create-title">Server Information</h3>
                                <div class="form-group">
                                    <label for="domain" class="col-sm-4 control-label">Domain</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="domain" name="domain" value="{{ $site->domain }}"  placeholder="Domain">
                                        @if ($errors->has('domain')) <p class="error-message">{{ $errors->first('domain') }}</p> @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-address" class="col-sm-12 control-label text-left">Hosting</label>
                                    <div class="col-sm-12">
                                        <div class="form-group infor-child">
                                            <label for="host" class="col-sm-4 control-label">Host</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="host" name="host" value="{{ $site->hosting->host }}"  placeholder="Host">
                                                @if ($errors->has('host')) <p class="error-message">{{ $errors->first('host') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="form-group infor-child">
                                            <label for="host-username" class="col-sm-4 control-label">Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="host-username" name="host-username" value="{{ $site->hosting->username }}"  placeholder="Username">
                                                @if ($errors->has('host-username')) <p class="error-message">{{ $errors->first('host-username') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="form-group infor-child">
                                            <label for="host-password" class="col-sm-4 control-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" id="host-password" name="host-password" value="{{ $site->hosting->password }}"  placeholder="Password">
                                                @if ($errors->has('host-password')) <p class="error-message">{{ $errors->first('host-password') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email-address" class="col-sm-12 control-label">Database</label>
                                    <div class="col-sm-12">
                                        <div class="form-group infor-child">
                                            <label for="database-name" class="col-sm-4 control-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="database-name" name="database-name" value="{{ $site->database->database_name }}"  placeholder="Name">
                                                @if ($errors->has('database-name')) <p class="error-message">{{ $errors->first('database-name') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="form-group infor-child">
                                            <label for="database-host" class="col-sm-4 control-label">Host</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="database-host" id="database-host" value="{{ $site->database->host }}"  placeholder="Host">
                                                @if ($errors->has('database-host')) <p class="error-message">{{ $errors->first('database-host') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="form-group infor-child">
                                            <label for="database-username" class="col-sm-4 control-label">Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="database-username" name="database-username"  value="{{ $site->database->username }}" placeholder="Username">
                                                @if ($errors->has('database-username')) <p class="error-message">{{ $errors->first('database-username') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="form-group infor-child">
                                            <label for="database-password" class="col-sm-4 control-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" id="database-password" name="database-password" value="{{ $site->database->password }}"  placeholder="Password">
                                                @if ($errors->has('database-password')) <p class="error-message">{{ $errors->first('database-password') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="step-bottom row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                {{--<a href="{{ Admin::route('siteManager.select-template') }}">--}}
                                    {{--<button class="btn btn-success">Back</button>--}}
                                {{--</a>--}}
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ Admin::route('siteManager.add-info') }}">
                                    <button class="btn btn-success">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style-top')
    <style>
        .information{
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            padding-bottom: 60px;
        }

        .doctor-infor{
            border: 1px solid #cccccc;
            margin-bottom: 20px;
        }

        .information label{
            text-align: left !important;
        }

        .create-title{
            margin-bottom: 15px;
        }

        .step-bottom{
            margin-bottom: 50px;
        }

        .infor-child label{
            padding-left: 50px;
        }

        .doctor-infor li span{
            font-weight: bold;
            color: #000000;
            width: 150px;
            display: inline-block;

        }

        .doctor-infor li ul{
            padding-left: 20px;
        }
        .error-message{
            margin-top: 5px;
            color: red;
        }

        .require{
            color: red;
        }

    </style>
@endpush