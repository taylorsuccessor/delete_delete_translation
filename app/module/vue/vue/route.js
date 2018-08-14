
const route = [
    { path: '/admin/vue', component: require('./page/index') ,name:'admin.vue.index' },
    { path: '/admin/vue/create', component: require('./page/create') ,name:'admin.vue.create'},
    { path: '/admin/vue/:id/edit', component: require('./page/edit') ,name:'admin.vue.edit'},
    { path: '/admin/vue/:id', component: require('./page/show') ,name:'admin.vue.show' },
];

export default route;


