import User from "@resource/user/User";

export default class ServerDataInit{


    constructor(serverData){
console.log(serverData);
        User.user=serverData.data.user;
    }

}