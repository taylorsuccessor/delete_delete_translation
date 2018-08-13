@extends('admin.layout::main')

@section('title', trans('general.upload_file'))
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url(/assets/admin/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.upload_file') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.upload_file') }}</a></li>
                        <li class="active">{{ trans('upload_file::upload_file.editupload_file') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('upload_file::upload_file.upload_file') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('upload_file::upload_file.editupload_file') }}</p>
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


                                {!! Form::model($upload_file, [
                                    'method' => 'PATCH',
                                    'url' => ['/admin/upload_file', $upload_file->id],
                                    'class' => 'form-horizontal'
                                ]) !!}







                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('upload_file::upload_file.editupload_file') }}</span>
                                    </div>

                                    <div class="panel-body">





                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('user_id', trans('upload_file::upload_file.user_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('upload_group_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('upload_group_id', trans('upload_file::upload_file.upload_group_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('upload_group_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('upload_group_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('name', trans('upload_file::upload_file.name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('original_name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('original_name', trans('upload_file::upload_file.original_name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('original_name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('original_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('new_name') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('new_name', trans('upload_file::upload_file.new_name'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('new_name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('new_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('upload_base_url') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('upload_base_url', trans('upload_file::upload_file.upload_base_url'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('upload_base_url', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('upload_base_url', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('detail', trans('upload_file::upload_file.detail'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('detail', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                



                                        <div class="form-group">
                                            <div class="col-sm-offset-9 col-sm-3">
                                                {!! Form::submit(trans('general.update'), ['class' => 'btn btn-primary form-control']) !!}
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