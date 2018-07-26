@extends('admin.layout::main')

@section('title', trans('general.vue'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.vue') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.vue') }}</a></li>
                        <li class="active">{{ trans('vue::vue.vueCreate') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('vue::vue.vue') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('vue::vue.addvue') }}</p>
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

                                {!! Form::model($request,['url' => '/admin/vue', 'class' => 'form-horizontal']) !!}





                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('vue::vue.addvue') }}</span>
                                    </div>

                                    <div class="panel-body">



                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('email', trans('vue::vue.email'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('password', trans('vue::vue.password'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('name', trans('vue::vue.name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('birth_day') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('birth_day', trans('vue::vue.birth_day'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('birth_day', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('birth_day', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('phone', trans('vue::vue.phone'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('gender', trans('vue::vue.gender'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('gender', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        






                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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