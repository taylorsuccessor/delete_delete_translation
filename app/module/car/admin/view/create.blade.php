@extends('admin.layout::main')

@section('title', trans('general.car'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.car') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.car') }}</a></li>
                        <li class="active">{{ trans('car::car.carCreate') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('car::car.car') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('car::car.addcar') }}</p>
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

                                {!! Form::model($request,['url' => '/admin/car', 'class' => 'form-horizontal']) !!}





                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('car::car.addcar') }}</span>
                                    </div>

                                    <div class="panel-body">



                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('name', trans('car::car.name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('email', trans('car::car.email'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('type', trans('car::car.type'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('type', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('phone', trans('car::car.phone'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
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