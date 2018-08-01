@extends('admin.layout::main')
@section('title', trans('translation::translation.translation'))
@section('content')


    <?php
    $canEdit=canAccess('admin.translation.edit');
    $canDestroy=canAccess('admin.translation.destroy');


   ?>




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
                            <li class="active">{{ trans('general.details') }}</li>
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
                            <h3 class="box-title m-b-0">{{ trans('general.translation') }}</h3>
                            <p class="text-muted m-b-40">{{ trans('general.details') }}</p>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">


                                <li role="presentation" class="active">
                                    <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>{{trans('general.detail')}}</span></a>
                                </li>

                                

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div role="tabpanel" class="tab-pane active" id="idetail">


                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">{{ trans('translation::translation.translationInfo') }}</span>
                                        </div>

                                        <div class="panel-body">


                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.translate_en') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['translate_en'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.translate_ar') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['translate_ar'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.translate_before_en') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['translate_before_en'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.translate_after_en') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['translate_after_en'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.translate_before_ar') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['translate_before_ar'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.translate_after_ar') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['translate_after_ar'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.user_id') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['user_id'] }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ trans('translation::translation.status') }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{$translation['status'] }}</label>
                                                </div>
                                            </div>

                                            </div>
                                            



                                            <div class="row">

                                                <div class="col-xs-offset-6 col-xs-3">

                                                    @if($canEdit)
                                                        <a href="/admin/translation/{{ $translation['id'] }}/edit"
                                                           class="fa fa-edit btn btn-primary form-control"> {{trans('translation.edit')}}</a>
                                                    @endif
                                                </div>
                                                <div class=" col-xs-3">
                                                    @if($canDestroy)
                                                        {!! Form::open(['method' => 'DELETE',
                                                'url' => ['/admin/translation',$translation['id']]]) !!}
                                                        <button type="submit" name="Delete" class="deleteRow  btn btn-danger form-control" >
                                                            <i class="fa fa-trash"></i>
                                                            {{trans('general.delete')}}
                                                        </button>
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>

                                            </div>


                                        </div>
                                        <!-- row -->
                                    </div>


                                </div>




                                

                            </div>
                        </div>
                    </div>

                </div>







            </div>
        </div>



@stop