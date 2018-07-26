
<template>
    <div>

        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row bg-title" style="background:url(/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
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


                            @include('admin.layout::partial.messages')
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
                                                        <label class="control-label">Email  </label>
                                                    </div>
                                                </div>

                                                    <div class="col-sm-4 text-left">
                                                        <div class="form-group no-margin-hr">
                                                            <label class="control-label">{{data.email }}</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-2 text-right">
                                                        <div class="form-group no-margin-hr">
                                                            <label class="control-label">Password  </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 text-left">
                                                        <div class="form-group no-margin-hr">
                                                            <label class="control-label">{{data.password }}</label>
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
        console.log('mounted');
        axios.get('http://localhost:8000/admin/vue/'+this.$route.params.id,this.data).then((response)=>{

            this.data=response.data.data;

    });

    },
    methods:{


    },

    }


</script>






























