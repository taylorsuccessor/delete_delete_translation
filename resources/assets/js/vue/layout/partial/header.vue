
<template>



    <nav class=" navbar navbar-default navbar-static-top m-b-0"  >
        <div class="navbar-header">

            <div class="top-left-part"><a class="logo" href="/">

                <img src="/assets/website/images/whiteLogoPart.png" alt="home" class="light-logo" style="width:56px;height:50px;" /></a></div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="logotext">

                    <img src="/assets/website/images/whiteLogo.png" style="max-width:100px;" class="light-logo" alt="home" /></a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">





                <li class="dropdown">

                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" onclick="$('#notificationDropdown').show();" onblur="setTimeout('$(\'#notificationDropdown\').hide();',1000);"><i class="icon-bell"></i>
                    <div    v-bind:class="{ notify: notificationList.length }" ><span class="heartbit"></span><span class="point"></span></div>
                </a>
                    <ul class="dropdown-menu  mailbox animated bounceInDown" id="notificationDropdown">
                        <li>
                            <div class="drop-title">You have {{notificationList.length}} new Notification</div>
                        </li>
                        <li>
                            <div class="message-center">





                                <a  v-for="notification in notificationList"  :href="notification.url " >
                                    <div class="user-img">
                                        <i :class="selectNotificationIcon(notification.url )"></i>
                                        <span class="profile-status  pull-right"   v-bind:class="{ online: !notification.is_read>0 }"  ></span> </div>
                                    <div class="mail-contnet">
                                        <h5> {{ notification.title }} </h5>
                                        <span class="mail-desc">{{ notification.body }} </span> <span class="time">{{notification.created_at}}</span> </div>
                                </a>




                            </div>
                        </li>
                        <li> <a class="text-center" href=""> <strong> clearNotification </strong> <i class="fa fa-angle-right"></i> </a></li>
                    </ul>
                </li>










                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"  onclick="$('#languageListDropdown').show();" onblur="setTimeout('$(\'#languageListDropdown\').hide();',1000);">
                        <i class="fa fa-language"></i>
                        language
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated slideInUp " id="languageListDropdown">


                        <li  v-for="language in languageList" > <a :href="'?locale='+language">
                           {{language | translate}}
                        </a> </li>


                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" onclick="$('#userHeaderDropdown').show();" onblur="setTimeout('$(\'#userHeaderDropdown\').hide();',1000);">
                        <img :src="user.avatar" alt="user-img" width="36" class="img-circle">
                        <b class="hidden-xs"> {{user.first_name}}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY" id="userHeaderDropdown">

                        <li role="separator" class="divider"></li>
                        <li><a href="  logout"><i class="fa fa-power-off"></i>  {{ 'logout' | translate}} </a></li>
                    </ul>
                </li>
                <li class="right-side-toggle" onclick="$('body').toggleClass('rmv-right-panel');"><a class="waves-effect waves-light" href="javascript:void(0)"> <i class="ti-arrow-right"></i></a></li>

            </ul>
        </div>
    </nav>





















</template>




<script>
    import ApiBase from '@resource/api/ApiBase'
    import User from '@resource/user/User'

    export default{

    props:[],
            data(){
        return {
            notificationList:[],
            languageList:['en','ar'],
            user:User.user
            }
            },

    created(){
        this.getList();
        Echo.private('App.User.'+User.user.id).listen('.App\\module\\user_notification\\event\\Create', (e) => {
          notification(e.model.title)
            this.notificationList.unshift(e.model);

        });

    },
    methods:{


        getList(){
            new ApiBase().get('api/user_notification',{},response=>this.notificationList = response.data);
        },
        selectNotificationIcon(url){
        var img='icon-bell';
        if(url.startsWith('/admin/hyperpay')){
            img='icon-credit-card';
        }
        else if(url.startsWith('/admin/user'))
        {
            img='icon-user';
        }
        return img;
    }

    },
    computed:{


    }
    }


</script>