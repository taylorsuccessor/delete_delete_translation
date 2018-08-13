@extends('admin.layout::main')
@section('title', trans('general.roles'))

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{asset('/assets/admin/plugins/images/heading-title-bg.jpg')}}) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.roles') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.roles') }}</a></li>
                        <li class="active">{{ trans('general.roles') }}</li>
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
                            <h3 class="box-title m-b-0">{{ trans('general.rolesTableHead') }}</h3>
                            <p class="text-muted m-b-20">{{ trans('general.rolesTableDescription') }}</p>



                        </div>
                        <div class="col-xs-3">
                            <a  href="{{route('admin.role.create')}}"class="btn btn-primary form-control">
                                + {{trans('general.rolesCreate')}}
                            </a>
                        </div>

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">
                                        {!! th_sort(trans('general.id'), 'id', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                                        {!! th_sort(trans('role::role.slug'), 'slug', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                                        {!! th_sort(trans('general.name'), 'name', $oResults) !!}
                                    </th>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">
                                        {!! th_sort(trans('general.created_at'), 'created_at', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">
                                        {!! th_sort(trans('general.updated_at'), 'updated_at', $oResults) !!}
                                    </th>


                                <th class="actionHeader"><i class="fa fa-cog"></i> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                <?php $i=0;$class=''; ?>

                                @foreach($oResults as $oResult)
                                    <?php $class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;?>
                                    <tr class='{{ $class }}'>

                                                                                <td>{{ $oResult->id }}</td>

                                                                                <td>{{ $oResult->slug }}</td>

                                                                                <td><a href="/common/roles/{{ $oResult->id }}">{{ $oResult->name }}</a></td>


                                                                                <td>{{ $oResult->created_at }}</td>

                                                                                <td>{{ $oResult->updated_at }}</td>

                                        
                                        <td>

                                            <div class="tableActionsMenuDiv">
                                                <div class="innerContainer">
                                                    <i class="fa fa-list menuIconList"></i>



                                            {!! Form::open(['method' => 'DELETE',
                                            'url' => ['/admin/role',$oResult->id]]) !!}
                                                    <button type="submit" name="Delete" class="deleteRow" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                            {!! Form::close() !!}

                                            <a href="/admin/role/{{ $oResult->id }}/edit"
                                               class="fa fa-edit"></a>
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
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> {!!trans('general.CopyRights')!!} </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->
        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('general.search') }}</h3>

                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}




                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('id', $request['id'], ['placeholder'=>trans('general.id'),'class'=>'form-control input-sm ']) !!}


                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('slug', $request['slug'], ['placeholder'=>trans('role::role.slug'),'class'=>'form-control input-sm ']) !!}


                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('name', $request['name'], ['placeholder'=>trans('general.name'),'class'=>'form-control input-sm ']) !!}


                    </div>
                </div>

                



                


                




                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('general.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>

                {!! Form::hidden('sort', $request['sort']) !!}
                {!! Form::hidden('order', $request['order']) !!}
                {!! Form::close()!!}
            </div>
        </div>

        @stop
