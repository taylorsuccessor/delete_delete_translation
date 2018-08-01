@extends('admin.layout::main')

@section('title', trans('general.translation'))
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url(/assets/admin/images/banner-img.png) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.translation') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.translation') }}</a></li>
                        <li class="active">{{ trans('translation::translation.edittranslation') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('translation::translation.translation') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('translation::translation.edittranslation') }}</p>
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


                                {!! Form::model($translation, [
                                    'method' => 'PATCH',
                                    'url' => ['/admin/translation', $translation->id],
                                    'class' => 'form-horizontal'
                                ]) !!}







                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('translation::translation.edittranslation') }}</span>
                                    </div>

                                    <div class="panel-body">





                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('translate_en') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('translate_en', trans('translation::translation.translate_en'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('translate_en', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('translate_en', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('translate_ar') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('translate_ar', trans('translation::translation.translate_ar'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('translate_ar', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('translate_ar', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('translate_before_en') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('translate_before_en', trans('translation::translation.translate_before_en'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('translate_before_en', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('translate_before_en', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('translate_after_en') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('translate_after_en', trans('translation::translation.translate_after_en'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('translate_after_en', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('translate_after_en', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('translate_before_ar') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('translate_before_ar', trans('translation::translation.translate_before_ar'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('translate_before_ar', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('translate_before_ar', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('translate_after_ar') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('translate_after_ar', trans('translation::translation.translate_after_ar'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('translate_after_ar', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('translate_after_ar', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('user_id', trans('translation::translation.user_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('status', trans('translation::translation.status'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('status', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                            </div>
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