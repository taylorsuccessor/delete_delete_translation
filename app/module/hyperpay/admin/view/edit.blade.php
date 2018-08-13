@extends('admin.layout::main')

@section('title', trans('general.hyperpay'))
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{asset('/assets/admin/plugins/images/heading-title-bg.jpg')}}) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.hyperpay') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.hyperpay') }}</a></li>
                        <li class="active">{{ trans('hyperpay::hyperpay.edithyperpay') }}</li>
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
                        <h3 class="box-title m-b-0">{{ trans('hyperpay::hyperpay.hyperpay') }}</h3>
                        <p class="text-muted m-b-40">{{ trans('hyperpay::hyperpay.edithyperpay') }}</p>
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


                                {!! Form::model($hyperpay, [
                                    'method' => 'PATCH',
                                    'url' => ['/admin/hyperpay', $hyperpay->id],
                                    'class' => 'form-horizontal'
                                ]) !!}







                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">{{ trans('hyperpay::hyperpay.edithyperpay') }}</span>
                                    </div>

                                    <div class="panel-body">





                                                                                
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('user_id', trans('hyperpay::hyperpay.user_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('amount', trans('hyperpay::hyperpay.amount'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('checkout_body') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('checkout_body', trans('hyperpay::hyperpay.checkout_body'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('checkout_body', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('checkout_body', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('checkout_id') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('checkout_id', trans('hyperpay::hyperpay.checkout_id'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('checkout_id', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('checkout_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('note', trans('hyperpay::hyperpay.note'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('note', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('response_body') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('response_body', trans('hyperpay::hyperpay.response_body'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('response_body', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('response_body', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        </div>                                        
                                        <div class="row">
                                        <div class="form-group {{ $errors->has('response_status') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('response_status', trans('hyperpay::hyperpay.response_status'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('response_status', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('response_status', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="form-group {{ $errors->has('return_url') ? 'has-error' : ''}}  col-xs-6">
                                            {!! Form::label('return_url', trans('hyperpay::hyperpay.return_url'), ['class' => 'col-sm-4 control-label']) !!}
                                            <div class="col-sm-8">
                                                {!! Form::text('return_url', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('return_url', '<p class="help-block">:message</p>') !!}
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