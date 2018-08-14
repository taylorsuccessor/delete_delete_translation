require('@resource/authorization/Authorization');
const route = [
    { path: '/vue/project', component: require('./page/index') ,name:'vue.project.index',beforeEnter:authorization},
    { path: '/vue/project/create', component: require('./page/create') ,name:'vue.project.create'},
    { path: '/vue/project/:id/edit', component: require('./page/edit') ,name:'vue.project.edit'},
    { path: '/vue/project/:id', component: require('./page/show') ,name:'vue.project.show',beforeEnter:authorization},
];

export default route;


