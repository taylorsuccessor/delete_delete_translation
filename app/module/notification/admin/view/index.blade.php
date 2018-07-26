@extends('admin.layout::main')
@section('title', trans('general.notification'))

@section('content')



    <?php

    $canShow=canAccess('admin.notification.show');
    $canEdit=canAccess('admin.notification.edit');
    $canDestroy=canAccess('admin.notification.destroy');
    $canCreate=canAccess('admin.notification.create');


    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('project.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.notification') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.notification') }}</a></li>
                        <li class="active">{{ trans('general.notification') }}</li>
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




                        @include('admin.layout::partial.messages')

                        <div class=" col-xs-9">
                            <h3 class="box-title m-b-0">{{ trans('notification::notification.notificationTableHead') }}</h3>
                            <p class="text-muted m-b-20">{{ trans('notification::notification.notificationTableDescription') }}</p>



                        </div>
                        @if($canCreate)
                        <div class="col-xs-3">
                            <a  href="{{route('admin.notification.create')}}"class="btn btn-primary form-control">
                                + {{trans('notification::notification.notificationCreate')}}
                            </a>
                        </div>
                        @endif

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">
                                        {!! th_sort(trans('notification::notification.id'), 'id', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                                        {!! th_sort(trans('notification::notification.name'), 'name', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                                        {!! th_sort(trans('notification::notification.title'), 'title', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                                        {!! th_sort(trans('notification::notification.type'), 'type', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">
                                        {!! th_sort(trans('notification::notification.status'), 'status', $oResults) !!}
                                    </th>



                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">
                                        {!! th_sort(trans('notification::notification.language'), 'language', $oResults) !!}
                                    </th>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">
                                        {!! th_sort(trans('notification::notification.created_at'), 'created_at', $oResults) !!}
                                    </th>



                                
                                    @if($canEdit ||$canShow || $canDestroy)
                                    <th class="actionHeader"><i class="fa fa-cog"></i> </th>
                                        @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                <?php $i=0; $class=''; ?>
                                @foreach($oResults as $oResult)
                                   <?php $class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;?>
                                    <tr class='{{ $class }}'>

                                                                                <td>{{ $oResult->id }}</td>

                                                                                <td>{{ $oResult->name }}</td>

                                                                                <td>{{ $oResult->title }}</td>

                                                                                <td>{{ $oResult->type }}</td>

                                                                                <td>{{ array_key_exists($oResult->status,config('module.notification_status'))? config('module.notification_status')[$oResult->status]:'' }}</td>



                                                                                <td>{{ $oResult->language }}</td>


                                                                                <td>{{ $oResult->created_at }}</td>


                                        
                                        <td>

                                            <div class="tableActionsMenuDiv">
                                                <div class="innerContainer">
                                                    <i class="fa fa-list menuIconList"></i>

                                                    @if( $canDestroy)
                                                    {!! Form::open(['method' => 'DELETE',
                                                    'url' => ['/admin/notification',$oResult->id]]) !!}
                                                    <button type="submit" name="Delete" class="deleteRow" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    {!! Form::close() !!}
@endif
                                                        @if($canEdit )
                                            <a href="/admin/notification/{{ $oResult->id }}/edit"
                                               class="fa fa-edit"></a>
@endif



                                                </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends($request->all())->render()) !!}
                                </div>
                            </div>
                        @else
                            <div class="noResultDiv" >{{trans('general.noResult')}}</div>

                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> {!! trans('general.CopyRights') !!} </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->
        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('general.search') }}</h3>

                {!! Form::model($request,['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}




                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('id', null, ['placeholder'=>trans('notification::notification.id'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('name',[""=>"Name"]+config('module.notification_name'), null, ['placeholder'=>trans('notification::notification.name'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('title', null, ['placeholder'=>trans('notification::notification.title'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('type',[''=>'Type']+config('module.notification_type'), null, ['placeholder'=>trans('notification::notification.type'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('status',[''=>'Status']+config('module.notification_status'), null, ['placeholder'=>trans('notification::notification.status'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                


                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('language',config('module.notification_language'), null, ['placeholder'=>trans('notification::notification.language'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                


                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('body', null, ['placeholder'=>trans('notification::notification.body'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                




                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('general.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>

                {!! Form::hidden('sort', null) !!}
                {!! Form::hidden('order', null) !!}
                {!! Form::close()!!}
            </div>
        </div>

        @stop
