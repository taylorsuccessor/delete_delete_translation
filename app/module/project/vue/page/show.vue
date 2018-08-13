
<template>
    <div>

        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row bg-title" style="background:url(/assets/admin/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Vue</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">Vue</a></li>
                            <li class="active">Vue Create</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <form role="search" method="get" action="" class="app-search hidden-xs pull-right">
                            <input type="text" placeholder=" Search ..." class="form-control">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>









                <div class="row">


                    <div class="col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Vue</h3>
                            <p class="text-muted m-b-40">Vue</p>


                            <ul class="nav nav-tabs" role="tablist">


                                <li role="presentation" class="active">
                                    <a href="#idetail" aria-controls="detail" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i>Basic</span></a>
                                </li>



                            </ul>

                            <div class="tab-content">


                                <div role="tabpanel" class="tab-pane active" id="idetail">






                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Add Vue</span>
                                        </div>

                                        <div class="panel-body">











                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'user_id'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.user_id }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'name'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.name }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'from_language'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.from_language }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'to_language'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.to_language }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'status'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.status }}</label>
                                                </div>
                                            </div>

                                            
                                                                                                                                    <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'created_at'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.created_at }}</label>
                                                </div>
                                            </div>

                                            </div>
                                                                                        <div class="row">                                            <div class="col-sm-2 text-right">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{ 'updated_at'| translate }}  </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 text-left">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">{{model.updated_at }}</label>
                                                </div>
                                            </div>

                                            
                                            
                                            </div>



                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>







            </div>
        </div>

    </div>
</template>



<script>
    import service from '@module/project/vue/service/service';

    export default{
        data(){
            return {
                model:{},
                errors:{}
            }
        },
        created(){
            Echo.private('App.User.1').listen('.App\\module\\project\\event\\Edit', (e) => {

                this.model=e.newModel;

        });

        },
        mounted(){

            new service().getOne(this.$route.params.id,this.setDataResult);


        },
        methods:{

            setDataResult(response){
                this.model=response.model;
            }

        },

    }


</script>






























