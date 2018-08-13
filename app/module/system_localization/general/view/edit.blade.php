@extends('general.layout::main')

@section('title', trans('general.system_localization'))
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url(/assets/admin/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.system_localization') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.system_localization') }}</a></li>
                        <li class="active">{{ trans('system_localization::system_localization.editsystem_localization') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('system_localization::system_localization.system_localization') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('system_localization::system_localization.editsystem_localization') }}</p>
                        <!-- Nav tabs -->

                        @include('general.layout::partial.messages')
                        <ul class="nav nav-tabs" role="tablist">


                            <li role="presentation" class="active">
                                <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.basic')}}</span></a>
                            </li>



                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div role="tabpanel" class="tab-pane active" id="idetail">


                                {!! Form::model($system_localization, [
                                    'method' => 'PATCH',
                                    'url' => ['/general/system_localization', $system_localization->id],
                                    'class' => 'form-horizontal'
                                ]) !!}







                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('system_localization::system_localization.editsystem_localization') }}</span>
                                    </div>

                                    <div class="panel-body">





                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('key', trans('system_localization::system_localization.key'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('key', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('en') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('en', trans('system_localization::system_localization.en'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('en', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('en', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('ar') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('ar', trans('system_localization::system_localization.ar'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('ar', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('ar', '<p class="help-block">:message</p>') !!}
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