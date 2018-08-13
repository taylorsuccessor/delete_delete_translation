@extends('admin.layout::main')

@section('title', trans('general.user_notification'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{asset('/assets/admin/plugins/images/heading-title-bg.jpg')}}) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.user_notification') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.user_notification') }}</a></li>
                        <li class="active">{{ trans('user_notification::user_notification.user_notificationCreate') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('user_notification::user_notification.user_notification') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('user_notification::user_notification.adduser_notification') }}</p>
                        <!-- Nav tabs -->

                        @include('admin.layout::partial.messages')
                        <ul class="nav nav-tabs" role="tablist">


                            <li role="presentation" class="active">
                                <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.basic')}}</span></a>
                            </li>



                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div role="tabpanel" class="tab-pane active" id="idetail">

                                {!! Form::model($request,['url' => '/admin/user_notification', 'class' => 'form-horizontal']) !!}





                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('user_notification::user_notification.adduser_notification') }}</span>
                                    </div>

                                    <div class="panel-body">



                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('user_id', trans('user_notification::user_notification.user_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('title', trans('user_notification::user_notification.title'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('body', trans('user_notification::user_notification.body'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('body', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('url', trans('user_notification::user_notification.url'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('url', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('is_read') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('is_read', trans('user_notification::user_notification.is_read'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('is_read', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('is_read', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                






                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit(trans('general.create'), ['class' => 'btn btn-primary form-control']) !!}
                                            </div>
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
@endsection