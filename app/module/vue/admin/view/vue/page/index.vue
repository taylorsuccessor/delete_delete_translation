
<template>


  <div id="page-wrapper">
    <div class="container-fluid">

    <div class="row bg-title" style="background:url(/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
    <div class="col-lg-12">
    <h4 class="page-title"><router-link to="/foo">foo link</router-link>title</h4>
</div>
<div class="col-sm-6 col-md-6 col-xs-12">
    <ol class="breadcrumb pull-left">
<li><a href="#">title</a></li>
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
        <router-link to="/admin/vue/create" href="create"class="btn btn-primary form-control">Create</router-link>

</div>


<table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>


    <thead>
        <tr>


            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">
        id
    </th>

    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
     email
</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
    password
</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
    name
</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">
    Birth Day

</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">
    Phone
</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">
    Gender
</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">
    Created At
</th>

<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">
    Updated At
</th>


    <th class="actionHeader"><i class="fa fa-cog"></i> </th>

</tr>
</thead>
<tbody>


                             <tr class='odd' v-for="oResult in data.oResults " :id="'tr_'+oResult.id">

    <td>id</td>

<td>{{oResult.email}}</td>

<td>password</td>

<td>name</td>

<td>birth day</td>

<td>phone</td>

<td>gender</td>

<td>create</td>

<td>update</td>


<td>

    <div class="tableActionsMenuDiv">
    <div class="innerContainer">
    <i class="fa fa-list menuIconList"></i>

        <a v-on:click="deleteRow(oResult.id)"
           class="fa fa-trash"></a>

        <a :href="'#/admin/vue/'+oResult.id+'/edit'"
           class="fa fa-edit"></a>

        <a :href="'#/admin/vue/'+oResult.id"
           class="fa  fa-file-text"></a>



    </div>
    </div>
    </td>
    </tr>







</tbody>
</table>



        <pagination  :total="data.total" @changePage="changePage"  :pagination_size="data.pagination_size" ></pagination>



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
    export default{
        data(){
        return {
            data:{},
         search:{page:1 },
        }
    },
    created(){
        console.log('created');
        this.getData();
    },
    mounted(){
        console.log('mounted');
    },
    methods:{
        getData(){
            axios.get('http://localhost:8000/admin/vue',{params:this.search}).then((response)=>{
                console.log(response.data);
            this.data=response.data;
            this.total=response.data.total  ;

        });
        },

    deleteRow(id){

        if(!confirm('Are you sure that you want delete ?')){return false;}
        axios.delete('/admin/vue/'+id,this.data).then((response)=>{

            $('#tr_'+id).remove();

            this.errors={};
    }
    );


    },
    changePage(page){
       this.search.page=page;
        this.getData();
    }
    },

    }


</script>