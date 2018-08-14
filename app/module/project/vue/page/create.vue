<template>
    <div>

        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row bg-title" style="background:url(/assets/admin/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{'project' |translate}}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">{{'project' |translate}}</a></li>
                            <li class="active">{{'project' |translate}} {{'create' |translate}}</li>
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




                                    <form  v-on:submit.prevent="submit">


                                        <div class="panel">
                                            <div class="panel-heading">
                                                <span class="panel-title">{{'project' |translate}}</span>
                                            </div>

                                            <div class="panel-body">




                                                
                                                <div class="row">
                                                <div   v-bind:class="{ 'has-error ': errors.user_id }"  class="form-group   col-xs-6">
                                                    <label for="user_id" class="col-sm-4 control-label">{{'user_id' |translate}}</label>

                                                    <div class="col-sm-8">
                                                        <input name="user_id" type="text" value="" v-model="model.user_id" class="form-control">
                                                        <p class="help-block" v-for="error in errors.user_id" v-text="error"></p>

                                                    </div>
                                                </div>
                                                                                                
                                                
                                                <div   v-bind:class="{ 'has-error ': errors.name }"  class="form-group   col-xs-6">
                                                    <label for="name" class="col-sm-4 control-label">{{'name' |translate}}</label>

                                                    <div class="col-sm-8">
                                                        <input name="name" type="text" value="" v-model="model.name" class="form-control">
                                                        <p class="help-block" v-for="error in errors.name" v-text="error"></p>

                                                    </div>
                                                </div>
                                                </div>                                                
                                                <div class="row">
                                                <div   v-bind:class="{ 'has-error ': errors.from_language }"  class="form-group   col-xs-6">
                                                    <label for="from_language" class="col-sm-4 control-label">{{'from_language' |translate}}</label>

                                                    <div class="col-sm-8">
                                                        <input name="from_language" type="text" value="" v-model="model.from_language" class="form-control">
                                                        <p class="help-block" v-for="error in errors.from_language" v-text="error"></p>

                                                    </div>
                                                </div>
                                                                                                
                                                
                                                <div   v-bind:class="{ 'has-error ': errors.to_language }"  class="form-group   col-xs-6">
                                                    <label for="to_language" class="col-sm-4 control-label">{{'to_language' |translate}}</label>

                                                    <div class="col-sm-8">
                                                        <input name="to_language" type="text" value="" v-model="model.to_language" class="form-control">
                                                        <p class="help-block" v-for="error in errors.to_language" v-text="error"></p>

                                                    </div>
                                                </div>
                                                </div>                                                
                                                <div class="row">
                                                <div   v-bind:class="{ 'has-error ': errors.status }"  class="form-group   col-xs-6">
                                                    <label for="status" class="col-sm-4 control-label">{{'status' |translate}}</label>

                                                    <div class="col-sm-8">
                                                        <input name="status" type="text" value="" v-model="model.status" class="form-control">
                                                        <p class="help-block" v-for="error in errors.status" v-text="error"></p>

                                                    </div>
                                                </div>
                                                                                                

                                                </div>



                                                <div class="form-group">
                                                    <div class="col-sm-offset-9 col-sm-3">

                                                        <button type="submit" name="create" class="btn btn-primary form-control" >{{ 'create' | translate }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>

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
    import User from '@resource/user/User';

    export default{
        data(){
            return {
                model:{},
                errors:{}
            }
        },
        created(){

        },
        mounted(){
        },
        methods:{
            submit(){
                var oService=new service();
                oService.errorCallback=this.postError;
                oService.post(this.model,this.postResult);

            },
            postResult(response){

                this.model=response;

                this.errors={};
                notification(this,translate('createdSuccessfully'));
                this.$router.push({name:'vue.project.index'});
            },
            postError(error){
                this.errors=error.response.data.errors;
            },
        },

    }


</script>