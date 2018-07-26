@extends('common.layouts.main')
@section('title', trans('edit_config::edit_config.edit_config'))
@section('content')


    {{--*/

    $canEdit=canAccess('admin.edit_config.edit');
    $canDestroy=canAccess('admin.edit_config.destroy');


    /*--}}





    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ trans('general.edit_config') }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">{{ trans('general.edit_config') }}</a></li>
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


                    <div class="col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">{{ trans('general.edit_config') }}</h3>
                            <p class="text-muted m-b-40">{{ trans('general.details') }}</p>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">


                                <li role="presentation" class="active">
                                    <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.detail')}}</span></a>
                                </li>

                                

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div role="tabpanel" class="tab-pane active" id="idetail">


                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">{{ trans('edit_config::edit_config.edit_configInfo') }}</span>
                                        </div>

                                        <div class="panel-body">


                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('edit_config::edit_config.key') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$edit_config['key'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('edit_config::edit_config.value') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$edit_config['value'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('edit_config::edit_config.created_at') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$edit_config['created_at'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('edit_config::edit_config.updated_at') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$edit_config['updated_at'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                            



                                            <div class="row">

                                                <div class="col-xs-offset-6 col-xs-3">

                                                    @if($canEdit)
                                                        <a href="/admin/edit_config/{{ $edit_config['id'] }}/edit"
                                                           class="fa fa-edit btn btn-primary form-control"> {{trans('edit_config.edit')}}</a>
                                                    @endif
                                                </div>
                                                <div class=" col-xs-3">
                                                    @if($canDestroy)
                                                        {!! Form::open(['method' => 'DELETE',
                                                'url' => ['/admin/edit_config',$edit_config['id']]]) !!}
                                                        <button type="submit" name="Delete" class="deleteRow  btn btn-danger form-control" >
                                                            <i class="fa fa-trash"></i>
                                                            {{trans('edit_config.delete')}}
                                                        </button>
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>

                                            </div>


                                        </div>
                                        <!-- row -->
                                    </div>


                                </div>




                                

                            </div>
                        </div>
                    </div>

                </div>







            </div>
        </div>



@stop