import User from "@resource/user/User";
import Authorization from "@resource/authorization/Authorization";

export default class ServerDataInit{


    constructor(serverData){
        User.user=serverData.data.user;

        Authorization.allow_permission='|'+serverData.data.allow_permission;
        Authorization.deny_permission='|'+serverData.data.deny_permission;
        Authorization.csrf_token='|'+serverData.data.csrf_token;
    }

}