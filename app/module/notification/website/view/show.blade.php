@extends('common.layouts.main')
@section('title', trans('notification::notification.notification'))
@section('content')


    {{--*/

    $canEdit=canAccess('website.notification.edit');
    $canDestroy=canAccess('website.notification.destroy');


    /*--}}





    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ trans('general.notification') }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">{{ trans('general.notification') }}</a></li>
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
                            <h3 class="box-title m-b-0">{{ trans('general.notification') }}</h3>
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
                                            <span class="panel-title">{{ trans('notification::notification.notificationInfo') }}</span>
                                        </div>

                                        <div class="panel-body">


                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.name') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['name'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.title') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['title'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.type') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['type'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.status') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['status'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.to_field') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['to_field'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.to_email') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['to_email'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.language') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['language'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.data') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['data'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.body') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['body'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.created_at') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['created_at'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('notification::notification.updated_at') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$notification['updated_at'] }}</label>
                                                </div>
                                            </div>

                                            
                                            



                                            <div class="row">

                                                <div class="col-xs-offset-6 col-xs-3">

                                                    @if($canEdit)
                                                        <a href="/website/notification/{{ $notification['id'] }}/edit"
                                                           class="fa fa-edit btn btn-primary form-control"> {{trans('notification.edit')}}</a>
                                                    @endif
                                                </div>
                                                <div class=" col-xs-3">
                                                    @if($canDestroy)
                                                        {!! Form::open(['method' => 'DELETE',
                                                'url' => ['/website/notification',$notification['id']]]) !!}
                                                        <button type="submit" name="Delete" class="deleteRow  btn btn-danger form-control" >
                                                            <i class="fa fa-trash"></i>
                                                            {{trans('notification.delete')}}
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