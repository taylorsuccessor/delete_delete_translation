@extends('admin.layout::login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleResetPassword'))
@section('content')

    <div class="login-box">
        <div class="white-box">
            {!! Html::image('/assets/fxwebkit/img/logo.png', '', ['style' => 'width:100%']) !!}

            {!! Form::model($request,['class'=>'form-horizontal form-material']) !!}

            <h3 class="box-title m-b-20">{{ trans('authentication::authentication.resetPassword') }}</h3>

            @include('admin.layout::partial.messages')

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>trans('authentication::authentication.email')]) !!}

                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::password('password', ['class'=>'form-control','placeholder'=>trans('authentication::authentication.newPassword')]) !!}

                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>trans('authentication::authentication.confirmNewPassword')]) !!}

                </div>
            </div>




            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">

                    {{Form::hidden('token',$token)}}
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{trans('authentication::authentication.resetPassword')}}</button>

                </div>
            </div>

            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">

                </div>
            </div>
            </form>

        </div>
    </div>
@stop