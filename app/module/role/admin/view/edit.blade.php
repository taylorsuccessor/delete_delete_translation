@extends('admin.layout::main')

@section('title', trans('general.role'))
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{asset('/assets/admin/plugins/images/heading-title-bg.jpg')}}) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.role') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.role') }}</a></li>
                        <li class="active">{{ trans('general.editrole') }}</li>
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
                <div class="col-lg-12">
                    <div class="white-box">


    {!! Form::model($role, [
        'method' => 'PATCH',
        'url' => ['/admin/role', $role->id],
        'class' => 'form-horizontal'
    ]) !!}







        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.editrole') }}</span>
            </div>

            <div class="panel-body">





            
        <div class="row">

                
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} col-xs-12">
            {!! Form::label('name', trans('name'), ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        </div>        
        <div class="row">




            <div class="addPermissionAllForm">
                <div class="newPermission">

                    @if(is_array($request->old('permissionOneText')))

                        @foreach($request->old('permissionOneText') as   $permission)

                            @if($permission !='')
                                <div class=" col-xs-3">
                                    <div class="onePermissionDiv">
                                        <input type="hidden" value="{{$permission}}" name="permissionOneText['{{$permission}}']" >
                                        {{$permission}}
                                        <i class="fa fa-trash" onclick="$(this).parent().remove();"></i>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    @elseif(is_array($role['permissionOneText']) )

                        @foreach($role['permissionOneText'] as   $permission)
                            @if($permission !='')
                                <div class="col-xs-3">
                                    <div class="onePermissionDiv">
                                        <input type="hidden" value="{{$permission}}" name="permissionOneText['{{$permission}}']" >
                                        {{$permission}}
                                        <i class="fa fa-trash" onclick="$(this).parent().remove();"></i>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @endif
                </div>

                <div class="addPermissionForm col-sm-12">
                    @foreach(config('permission.permissionsSections') as $sectionIndex=>$aSection)
                        <div class="form-group {{ $errors->has('permissionOneText') ? 'has-error' : ''}}  col-xs-2">
                            <div class="col-sm-12">
                                {!! Form::select('addSection_'.$sectionIndex,['*'=>trans('general.all')]+$aSection, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('permissionOneText', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="  col-xs-4">
                        {!! Form::button(trans('general.addPermission'), ['class' => ' btn btn-primary  form-control','onclick'=>'addPermission();']) !!}

                    </div>


                </div>
            </div>


            <div class="addDenyPermissionAllForm">
                <div class="newDenyPermission">

                    @if(is_array($request->old('denyPermissionOneText')))

                        @foreach($request->old('denyPermissionOneText') as   $permission)

                            @if($permission !='')
                                <div class=" col-xs-3">
                                    <div class="oneDenyPermissionDiv">
                                        <input type="hidden" value="{{$permission}}" name="denyPermissionOneText['{{$permission}}']" >
                                        {{$permission}}
                                        <i class="fa fa-trash" onclick="$(this).parent().remove();"></i>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    @elseif(is_array($role['denyPermissionOneText']) )

                        @foreach($role['denyPermissionOneText'] as   $permission)
                            @if($permission !='')
                                <div class="col-xs-3">
                                    <div class="oneDenyPermissionDiv">
                                        <input type="hidden" value="{{$permission}}" name="denyPermissionOneText['{{$permission}}']" >
                                        {{$permission}}
                                        <i class="fa fa-trash" onclick="$(this).parent().remove();"></i>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @endif
                </div>

                <div class="addDenyPermissionForm col-sm-12">
                    @foreach(config('permission.permissionsSections') as $sectionIndex=>$aSection)
                        <div class="form-group {{ $errors->has('denyPermissionOneText') ? 'has-error' : ''}}  col-xs-2">
                            <div class="col-sm-12">
                                {!! Form::select('addSection_'.$sectionIndex,['*'=>trans('general.all')]+$aSection, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('denyPermissionOneText', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="  col-xs-4">
                        {!! Form::button(trans('general.addDenyPermission'), ['class' => ' btn btn-primary  form-control','onclick'=>'addDenyPermission();']) !!}

                    </div>


                        <script >

                            function addPermission(){

                                var selectedSections=[];
                                $('.addPermissionForm select option:selected').each(function(){
                                    var currentSection=$(this).text();
                                    var currentSection=(currentSection =='All')? '*':currentSection;
                                    selectedSections.push(currentSection);
                                });

                                var permissionText=selectedSections.join('.') ;
                                $('.newPermission').append('<div class=" col-xs-3"><div class="onePermissionDiv"><input type="hidden" value="'+permissionText+'" name="permissionOneText[\''+permissionText+'\']" >'+ permissionText + '<i class="fa fa-trash" onclick="$(this).parent().remove();"></i> </div> </div> ');
                            }
                            function addDenyPermission(){

                                var selectedSections=[];
                                $('.addDenyPermissionForm select option:selected').each(function(){
                                    var currentSection=$(this).text();
                                    var currentSection=(currentSection =='All')? '*':currentSection;
                                    selectedSections.push(currentSection);
                                });

                                var permissionText=selectedSections.join('.') ;
                                $('.newDenyPermission').append('<div class=" col-xs-3"><div class="oneDenyPermissionDiv"><input type="hidden" value="'+permissionText+'" name="denyPermissionOneText[\''+permissionText+'\']" >'+ permissionText + '<i class="fa fa-trash" onclick="$(this).parent().remove();"></i> </div> </div> ');
                            }


                        </script>
                        <style type="text/css">
                            .addPermissionAllForm,
                            .addDenyPermissionAllForm{
                                border:1px solid #ccc;
                                padding:25px 5px 0px 5px;
                                margin:20px 0px;
                                clear:both;
                            }

                            .addPermissionAllForm::after,
                            .addDenyPermissionAllForm::after{
                                clear:both;
                                width:100%;
                                display:block;
                                content:'';
                                height:0px;
                                overflow: 0px;;
                            }
                            .newPermission,.addDenyPermission{
                            }
                            .addPermissionForm,.addDenyPermissionForm{
                                clear:both;
                            }
                            .addPermissionForm button,.addDenyPermissionForm button{
                                float:left;

                            }
                            .newPermission .onePermissionDiv,.newDenyPermission .oneDenyPermissionDiv{
                                margin:5px 5px;
                                padding:5px 5px;
                                border:1px solid #475f91;clear:both;
                            }
                            .newPermission .onePermissionDiv i, .newDenyPermission .oneDenyPermissionDiv i{
                                float:right;
                                color:#ff5500;
                                cursor: pointer;
                            }
                        </style>

                </div>
            </div>



        </div>        
        <div class="row">
                


        <div class="form-group">
        <div class="col-sm-offset-9 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>

            </div>
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection