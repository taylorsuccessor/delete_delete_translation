@extends('admin.layout::login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))
@section('content')

    <div class="login-box">
        <div class="white-box">
            {!! Html::image('/assets/fxwebkit/img/logo.png', '', ['style' => 'width:100%']) !!}

            {!! Form::open(['id'=>'loginform' , 'class'=>'form-horizontal form-material']) !!}

            <h3 class="box-title m-b-20">{{ trans('authentication::authentication.enterEmailToResetPassword') }}</h3>

            @include('admin.layout::partial.messages')

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>trans('authentication::authentication.email')]) !!}

                </div>
            </div>




            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{trans('authentication::authentication.sendResetEmail')}}</button>

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