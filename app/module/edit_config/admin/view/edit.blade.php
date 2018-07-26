@extends('common.layouts.main')

@section('title', trans('general.edit_config'))
@section('content')


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
                        <li class="active">{{ trans('edit_config::edit_config.editedit_config') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('edit_config::edit_config.edit_config') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('edit_config::edit_config.editedit_config') }}</p>
                        <!-- Nav tabs -->

                        @include ('common/partials/messages')
                        <ul class="nav nav-tabs" role="tablist">


                            <li role="presentation" class="active">
                                <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.basic')}}</span></a>
                            </li>



                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div role="tabpanel" class="tab-pane active" id="idetail">


                                {!! Form::model($edit_config, [
                                    'method' => 'PATCH',
                                    'url' => ['/admin/edit_config', $edit_config->id],
                                    'class' => 'form-horizontal'
                                ]) !!}







                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('edit_config::edit_config.editedit_config') }}</span>
                                    </div>

                                    <div class="panel-body">





                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('key', trans('edit_config::edit_config.key'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('key', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('value', trans('edit_config::edit_config.value'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('value', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        



                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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