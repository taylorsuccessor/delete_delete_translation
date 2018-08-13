
<notifications position="bottom right" group="main_notification"  >
    <template slot="body" slot-scope="props" >
        <div class="vue-notification " >

            <a class="title" :href="props.item.link" v-text="props.item.link">

            </a>
            <a class="close" @click="props.close">
                <i class="fa fa-fw fa-close"></i>
            </a>
            <div v-html="props.item.text">
            </div>
        </div>
    </template>
</notifications>

<style type="text/css">
    .vue-notification {
        padding: 10px;
        margin: 0 5px 5px;

        font-size: 12px;

        color: #ffffff;
        background: #64c1b6;
        border-left: 5px solid #129a8a;
        display:none;
    }
    .vue-notification.warn {
        background: #ffb648;
        border-left-color: #f48a06;
    }
    .vue-notification.error {
        background: #E54D42;
        border-left-color: #B82E24;
    }
    .vue-notification.success {
        background: #68CD86;
        border-left-color: #42A85F;
    }

</style>

<script>
    function notification(vieReference,data){
        console.log(data);
        if (typeof data === 'string'){
            data={
                'title':'notification',
                'text':data,
                'link':'#',


            };
        }
        console.log(data);
            vieReference.$notify({
            group: 'main_notification',
            title: data.title,
            duration:6000,
            text: data.text,
            link:data.link,
        });
    }
</script>