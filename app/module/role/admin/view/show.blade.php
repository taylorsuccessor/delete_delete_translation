@extends('common.layouts.main')
@section('title', trans('general.roles'))
@section('content')





        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ trans('general.roles') }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">{{ trans('general.roles') }}</a></li>
                            <li class="active">{{ trans('general.details') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <form role="search" class="app-search hidden-xs pull-right">
                            <input type="text" placeholder=" {{ trans('general.search') }} ..." class="form-control">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">


                        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.rolesInfo') }}</span>
            </div>

            <div class="panel-body">


                                <div class="row">                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.slug') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$roles['slug'] }}</label>
                        </div>
                    </div>

                    
                                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.name') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$roles['name'] }}</label>
                        </div>
                    </div>

                    </div>
                <div class="row">



                                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.created_at') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$roles['created_at'] }}</label>
                        </div>
                    </div>






                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.updated_at') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$roles['updated_at'] }}</label>
                        </div>
                    </div>


                </div>
                <div class="row permissionDiv" >

                    <div class="col-sm-2 ">
                        <div class="form-group no-margin-hr">
                            <label class="">{{ trans('general.permissions') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-12 text-left">
                        <div class="form-group no-margin-hr">


                            @if(is_array($roles['permissionOneText']) )

                                @foreach($roles['permissionOneText'] as   $permission)
                                    @if($permission !='')
                                        <div class="onePermissionDiv col-xs-3">
                                            {{$permission}}

                                        </div>
                                    @endif
                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>




                <div class="row permissionDiv">

                    <div class="col-sm-2 ">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.denyPermissions') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-12 text-left">
                        <div class="form-group no-margin-hr">


                            @if(is_array($roles['denyPermissionOneText']) )

                                @foreach($roles['denyPermissionOneText'] as   $permission)
                                    @if($permission !='')
                                        <div class="onePermissionDiv col-xs-3">
                                            {{$permission}}

                                        </div>
                                    @endif
                                @endforeach

                            @endif

                        </div>
                    </div>
                    <style type="text/css">
.permissionDiv{clear:both; margin:30px 0px;border:1px solid #ccc;}
                        .onePermissionDiv{
                            margin:5px 5px;
                            padding:5px 5px;
                            border:1px solid #475f91;
                        }

                    </style>
                </div>
                    




                    <div class="row">

                        <div class="col-xs-offset-6 col-xs-3">


                            <a href="/common/roles/{{ $roles['id'] }}/edit"
                               class="fa fa-edit btn btn-primary form-control"> {{trans('general.edit')}}</a>
                        </div>
                        <div class=" col-xs-3">
                            {!! Form::open(['method' => 'DELETE',
                    'url' => ['/common/roles',$roles['id']]]) !!}
                            <button type="submit" name="Delete" class="deleteRow  btn btn-danger form-control" >
                                <i class="fa fa-trash"></i>
                                {{trans('general.delete')}}
                            </button>
                            {!! Form::close() !!}
                        </div>

                    </div>


                </div>
                <!-- row -->
            </div>




            <div class="panel-footer text-right">
                {{--<a href="{{ route('/client/product_list') }}">--}}
                    {{--<button type="submit" class="btn btn-primary"--}}
                            {{--name="edit_id">{{ trans('accounts::accounts.edit') }}</button>--}}
                {{--</a>--}}
            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@stop