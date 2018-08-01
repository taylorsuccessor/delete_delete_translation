@extends('admin.layout::main')

@section('title', trans('general.user'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.user') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.user') }}</a></li>
                        <li class="active">{{ trans('user::user.userCreate') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('user::user.user') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('user::user.adduser') }}</p>
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

                                {!! Form::model($request,['url' => '/admin/user', 'class' => 'form-horizontal']) !!}





                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('user::user.adduser') }}</span>
                                    </div>

                                    <div class="panel-body">



                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('email', trans('user::user.email'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('guest_email') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('guest_email', trans('user::user.guest_email'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('guest_email', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('guest_email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('password', trans('user::user.password'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>


                                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('password_confirmation', trans('user::user.password_confirmation'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('password_confirmation', null, ['class' => 'form-control']) !!}
                                                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                        </div>                                        
                                        <div class="row">



                                            <div class="form-group {{ $errors->has('android_device_id') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('android_device_id', trans('user::user.android_device_id'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('android_device_id', null, ['class' => 'form-control']) !!}
                                                    {!! $errors->first('android_device_id', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                        <div class="form-group {{ $errors->has('ios_device_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('ios_device_id', trans('user::user.ios_device_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('ios_device_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('ios_device_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                

                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('first_name', trans('user::user.first_name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('last_name', trans('user::user.last_name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('birth_day') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('birth_day', trans('user::user.birth_day'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('birth_day', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('birth_day', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('avatar', trans('user::user.avatar'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('avatar', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('phone', trans('user::user.phone'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('mobile', trans('user::user.mobile'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('area_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('area_id', trans('user::user.area_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('area_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('area_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('country', trans('user::user.country'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('country', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('address', trans('user::user.address'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('gender', trans('user::user.gender'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('gender', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('occupation') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('occupation', trans('user::user.occupation'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('occupation', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('type', trans('user::user.type'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('type', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('session_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('session_id', trans('user::user.session_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('session_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('session_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('lat', trans('user::user.lat'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('lat', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('long') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('long', trans('user::user.long'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('long', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('long', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>


                                            <div class="form-group {{ $errors->has('last_login') ? 'has-error' : ''}}  col-xs-6">
                                                {!! Form::label('last_login', trans('user::user.last_login'), ['class' => 'col-sm-4 control-label']) !!}
                                                <div class="col-sm-8">
                                                    {!! Form::text('last_login', null, ['class' => 'form-control']) !!}
                                                    {!! $errors->first('last_login', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                        </div>



@if(count($roleList))
                                        @foreach($roleList as $role_id=>$role_name)
                                            <div class="form-group {{ $errors->has("roles") ? "has-error" : ""}}  col-xs-2">

                                                <div class="col-sm-4">
                                                    {!! Form::checkbox("role[".$role_id."]", $role_id, null, ["class" => "form-control",'id'=>"role[".$role_id."]"]) !!}
                                                </div>
                                                <div class="col-sm-8">
                                                    {!! Form::label("role[".$role_id."]" ,$role_name, ["class" => " control-label"]) !!}
                                                    {!! $errors->first("roles", "<p class='help-block'>:message</p>") !!}
                                                </div>
                                            </div>
                                        @endforeach
  @endif




                                        <div class="row">






                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit('NotificationCreate', ['class' => 'btn btn-primary form-control']) !!}
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