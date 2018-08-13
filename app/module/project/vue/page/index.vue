
<template>


  <div id="page-wrapper">
    <div class="container-fluid">

    <div class="row bg-title" style="background:url(/assets/admin/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
    <div class="col-lg-12">
    <h4 class="page-title"><router-link to="/foo">foo link</router-link>title</h4>
</div>
<div class="col-sm-6 col-md-6 col-xs-12">
    <ol class="breadcrumb pull-left">
<li><a href="#">{{'vueCreate' | translate }} {{'admin.sfds.sdf.ddd' | can}}</a></li>
<li class="active">title</li>
</ol>
</div>
<div class="col-sm-6 col-md-6 col-xs-12">
<form role="search" class="app-search hidden-xs pull-right">
<input type="text" placeholder=" Searche ..." class="form-control">
<a href="javascript:void(0)"><i class="fa fa-search"></i></a>
</form>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
    <div class="white-box">




    <div class=" col-xs-9">
    <h3 class="box-title m-b-0">table header</h3>
<p class="text-muted m-b-20">Description</p>



</div>

    <div class="col-xs-3">
        <router-link to="/vue/project/create" href="create"class="btn btn-primary form-control">Create</router-link>

</div>


<table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>


    <thead>
        <tr>



            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'id' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'user_id' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'name' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'from_language' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'to_language' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'status' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'created_at' | translate }}
            </th>
            

            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                {{ 'updated_at' | translate }}
            </th>
            


    <th class="actionHeader"><i class="fa fa-cog"></i> </th>

</tr>
</thead>
<tbody>


                             <tr class='odd' v-for="oResult in data.results " :id="'tr_'+oResult.id">



                                                                  <td>{{ oResult.id }}</td>

                                                                  <td>{{ oResult.user_id }}</td>

                                                                  <td>{{ oResult.name }}</td>

                                                                  <td>{{ oResult.from_language }}</td>

                                                                  <td>{{ oResult.to_language }}</td>

                                                                  <td>{{ oResult.status }}</td>

                                                                  <td>{{ oResult.created_at }}</td>

                                                                  <td>{{ oResult.updated_at }}</td>

                                 


<td>

    <div class="tableActionsMenuDiv">
    <div class="innerContainer">
    <i class="fa fa-list menuIconList"></i>

        <a v-on:click="deleteRow(oResult.id)"
           class="fa fa-trash"></a>

        <a :href="'#/vue/project/'+oResult.id+'/edit'"
           class="fa fa-edit"></a>

        <a :href="'#/vue/project/'+oResult.id"
           class="fa  fa-file-text"></a>



    </div>
    </div>
    </td>
    </tr>







</tbody>
</table>



        <pagination  :total="data.count" @changePage="changePage"  :pagination_size="data.per_page" ></pagination>



</div>
</div>
</div>

<footer class="footer text-center"> Copy Rights</footer>
</div>


<div class="right-side-panel">
    <div class="scrollable-right container">

    <h3 class="title-heading">Search</h3>





<div class="form-group">
    <div class="col-md-12">
        {{search.email}}
        <input name="email" v-model="search.email" placeholder="email" class="form-control input-sm ">

</div>
</div>

<div class="form-group">
    <label class="col-md-12"></label>
    <div class="col-md-12">
        <button type="submit" name="search" class="btn btn-info btn-sm" v-on:click="getData">Search</button>
</div>
</div>

{!! Form::hidden('sort', null) !!}
{!! Form::hidden('order', null) !!}
{!! Form::close()!!}
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
            data:{'count': 0, 'results': [] ,per_page:15},
         search:{page:1 }
        }
    },
    created(){
            alert(User.user);
        this.getData();

        Echo.private('App.User.1').listen('.App\\module\\project\\event\\Edit', (e) => {
            var updatedIndex = this.data.results.findIndex(obj => obj.id == e.oldModel.id);
        this.data.results.splice(updatedIndex, 1, e.newModel);

    });
        Echo.private('App.User.1').listen('.App\\module\\project\\event\\Create', (e) => {

            this.data.results.unshift(e.model);

    });

        Echo.private('App.User.1').listen('.App\\module\\project\\event\\Delete', (e) => {
            var deletedModel=JSON.parse(e.model);
        $('#tr_'+deletedModel.id).remove();

    });

    },
    mounted(){
    },


    methods:{


setDataResult(response){
    this.data=response;
    this.total=response.total  ;
},
        getData(){


            new service().getList(this.search,this.setDataResult);


        },

    deleteRow(id){

        if(!confirm('Are you sure that you want delete ?')){return false;}

        new service().delete(id);

        $('#tr_'+id).remove();
    },
    changePage(page){
       this.search.page=page;
        this.getData();
    }
    },

    }


</script>