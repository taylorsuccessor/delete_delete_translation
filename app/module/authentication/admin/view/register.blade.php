@extends('admin.layout::login', array('class' => 'page-signin'))
@section('title', Lang::get('authentication::authentication.PageTitleSignIn'))
@section('content')

    <div class="login-box">
        <div class="white-box">
            {!! Html::image('/assets/fxwebkit/img/logo.png', '', ['style' => 'width:100%']) !!}

            {!! Form::open(['id'=>'loginform' , 'class'=>'form-horizontal form-material']) !!}
            <div class="dropdown" style="float:right;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#b4977A"><i class="fa fa-language"></i> Language</a>
                <ul class="dropdown-menu">

                    foreach(config('app.language')  as $locale=>$name)
                    <li><a href="?locale= $locale}}"> trans('general.'.$name) }}</a></li>

                    endforeach
                </ul>
            </div>
            <h3 class="box-title m-b-20">{{ trans('authentication::authentication.registerText') }}</h3>

            @include('admin.layout::partial.messages')

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>trans('authentication::authentication.email')]) !!}

                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>trans('authentication::authentication.name')]) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    {!! Form::password('password', ['class'=>'form-control','placeholder'=>trans('authentication::authentication.password')]) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>trans('authentication::authentication.password_confirmation')]) !!}

                </div>
            </div>





            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{trans('authentication::authentication.register')}}</button>

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