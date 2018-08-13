@extends('admin.layout::main')

@section('title', trans('general.notification'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{asset('/assets/admin/plugins/images/heading-title-bg.jpg')}}) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.notification') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.notification') }}</a></li>
                        <li class="active">{{ trans('notification::notification.notificationCreate') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" method="get" action="" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('general.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>









            <div class="row">


                <div class="col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('notification::notification.notification') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('notification::notification.addnotification') }}</p>
                        <!-- Nav tabs -->

                        @include ('admin.layout::partial.messages')
                        <ul class="nav nav-tabs" role="tablist">


                            <li role="presentation" class="active">
                                <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.basic')}}</span></a>
                            </li>



                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div role="tabpanel" class="tab-pane active" id="idetail">






                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('notification::notification.addnotification') }}</span>
                                    </div>

                                    <div class="panel-body">



                                        {!! Form::model($request,[ 'url'=>'/admin/notification/create', 'class' => 'form-horizontal','method'=>'get','id'=>'changeTemplateForm']) !!}
                                                                                
                                        <div class="row">

                                            <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}  col-xs-4">
                                                {!! Form::label('type', trans('notification::notification.type'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::select('type',config('module.notification_type'),null, ['class' => 'form-control','onchange'=>"$('#changeTemplateForm').submit();"]) !!}
                                                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}  col-xs-4">
                                            {!! Form::label('name', trans('notification::notification.name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::select('name',[""=>"Select One"]+config('module.notification_name'), null, ['class' => 'form-control','onchange'=>"$('#changeTemplateForm').submit();"]) !!}
                                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>


                                            <div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}  col-xs-4">
                                                {!! Form::label('language', trans('notification::notification.language'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::select('language',config('module.notification_language'), null, ['class' => 'form-control','onchange'=>"$('#changeTemplateForm').submit();"]) !!}
                                                    {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>



                                        </div>


                                        {!! Form::close() !!}

                                        {!! Form::model($request,['url' => '/admin/notification', 'class' => 'form-horizontal']) !!}

                                        {!! Form::hidden('type',null) !!}
                                        {!! Form::hidden('name',null) !!}
                                        {!! Form::hidden('language',null) !!}
                                        <div class="row">



                                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('title', trans('notification::notification.title'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('status', trans('notification::notification.status'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::select('status',config('module.notification_status'), null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('to_field') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('to_field', trans('notification::notification.to_field'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::select('to_field',config('module.notification_to_field'), null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('to_field', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('to_email') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('to_email', trans('notification::notification.to_email'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('to_email', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('to_email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">

                                        <div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}  col-xs-6"   style="display:none;">
                                            {!! Form::label('data', trans('notification::notification.data'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('data', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}  col-xs-12">
                                            {!! Form::label('body', trans('notification::notification.body'), ['class' => 'col-sm-12 control-label','style'=>'text-align:left;']) !!}
                                            <div class="col-sm-12">
                                                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                






                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit('NotificationCreate', ['class' => 'btn btn-primary form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                        {!! Form::close() !!}


                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>







        </div>
    </div>
@endsection