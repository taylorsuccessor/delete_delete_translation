@extends('admin.layout::main')
@section('title', trans('general.user'))

@section('content')



<?php     $canShow=canAccess('admin.user.show');
    $canEdit=canAccess('admin.user.edit');
    $canDestroy=canAccess('admin.user.destroy');
    $canCreate=canAccess('admin.user.create');


    ?>    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url(/assets/admin/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.user') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.user') }}</a></li>
                        <li class="active">{{ trans('general.user') }}</li>
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
                            <h3 class="box-title m-b-0">{{ trans('user::user.userTableHead') }}</h3>
                            <p class="text-muted m-b-20">{{ trans('user::user.userTableDescription') }}</p>



                        </div>
                        @if($canCreate)
                        <div class="col-xs-3">
                            <a  href="{{route('admin.user.create')}}"class="btn btn-primary form-control">
                                + {{trans('user::user.userCreate')}}
                            </a>
                        </div>
                        @endif

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">
                                        {!! th_sort(trans('user::user.id'), 'id', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                                        {!! th_sort(trans('user::user.email'), 'email', $oResults) !!}
                                    </th>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">
                                        {!! th_sort(trans('user::user.first_name'), 'first_name', $oResults) !!}
                                    </th>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">
                                        {!! th_sort(trans('user::user.phone'), 'phone', $oResults) !!}
                                    </th>




                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="23">
                                        {!! th_sort(trans('user::user.created_at'), 'created_at', $oResults) !!}
                                    </th>

                                
                                    @if($canEdit ||$canShow || $canDestroy)
                                    <th class="actionHeader"><i class="fa fa-cog"></i> </th>
                                        @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                               <?php $i=0; $class=''; ?>                                @foreach($oResults as $oResult)
                            <?php  $class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1; ?>                                    <tr class='{{ $class }}'>

                                                                                <td>{{ $oResult->id }}</td>

                                                                                <td>{{ $oResult->email }}</td>

                                                                                <td>{{ $oResult->first_name }}</td>
                                                                                <td>{{ $oResult->phone }}</td>




                                                                                <td>{{ $oResult->created_at }}</td>

                                        
                                        <td>

                                            <div class="tableActionsMenuDiv">
                                                <div class="innerContainer">
                                                    <i class="fa fa-list menuIconList"></i>

                                                    @if( $canDestroy)
                                                    {!! Form::open(['method' => 'DELETE',
                                                    'url' => ['/admin/user',$oResult->id]]) !!}
                                                    <button type="submit" name="Delete" class="deleteRow" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    {!! Form::close() !!}
@endif
                                                        @if($canEdit )
                                            <a href="/admin/user/{{ $oResult->id }}/edit"
                                               class="fa fa-edit"></a>
@endif
                                                            @if($canShow)
                                                    <a href="/admin/user/{{ $oResult->id }}"
                                                       class="fa fa-file-text"></a>
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
                        {!! Form::text('id', null, ['placeholder'=>trans('user::user.id'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('email', null, ['placeholder'=>trans('user::user.email'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>




                




                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('first_name', null, ['placeholder'=>trans('user::user.first_name'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('last_name', null, ['placeholder'=>trans('user::user.last_name'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                




                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('phone', null, ['placeholder'=>trans('user::user.phone'),'class'=>'form-control input-sm ']) !!}

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('mobile', null, ['placeholder'=>trans('user::user.mobile'),'class'=>'form-control input-sm ']) !!}

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
