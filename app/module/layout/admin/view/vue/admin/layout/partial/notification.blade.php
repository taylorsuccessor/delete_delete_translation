
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
