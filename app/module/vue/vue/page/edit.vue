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




                                    <form  v-on:submit.prevent="submit">


                                        <div class="panel">
                                            <div class="panel-heading">
                                                <span class="panel-title">Add Vue</span>
                                            </div>

                                            <div class="panel-body">




                                                <div class="row">
                                                    <div   v-bind:class="{ 'has-error ': errors.email }" class="form-group    col-xs-6">

                                                        <label for="email" class="col-sm-4 control-label">Email</label>
                                                        <div class="col-sm-8">

                                                            <input name="email" type="text" value="" v-model="data.email" class="form-control">
                                                            <p class="help-block" v-for="error in errors.email" v-text="error"></p>
                                                        </div>
                                                    </div>


                                                    <div   v-bind:class="{ 'has-error ': errors.password }" class="form-group    col-xs-6">

                                                        <label for="password" class="col-sm-4 control-label">Password</label>
                                                        <div class="col-sm-8">

                                                            <input name="password" type="password" value="" v-model="data.password" class="form-control">
                                                            <p class="help-block" v-for="error in errors.password" v-text="error"></p>
                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="form-group">
                                                    <div class="col-sm-offset-9 col-sm-3">

                                                        <button type="submit" name="create" class="btn btn-primary form-control" >Edit</button>
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

    import service from '@module/vue/vue/service/service';
    export default{
        data(){
            return {
                data:{},
                errors:{}
            }
        },
        created(){

            console.log('created');

        },
        mounted(){

            new service().getOne(this.$route.params.id,this.setDataResult);

        },
        methods:{

            setDataResult(response){
                this.data=response.data.data;
            },
            postResult(response){

                notification(this,translate('editedSuccessfully'));
                this.data=response.data;

                this.errors={};
                this.$router.push({name:'admin.vue.index'});
            },
            postError(error){
                this.errors=error.response.data.errors;
            },
            submit(){
                var oService=new service();
                oService.errorCallback=this.postError;
                oService.patch(this.$route.params.id,this.data,this.postResult);

            },

        },

    }


</script>