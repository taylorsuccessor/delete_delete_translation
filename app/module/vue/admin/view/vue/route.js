
const route = [
    { path: '/admin/vue', component: require('./page/index') },
    { path: '/admin/vue/create', component: require('./page/create') },
    { path: '/admin/vue/:id/edit', component: require('./page/edit') },
    { path: '/admin/vue/:id', component: require('./page/show') },
];

export default route;


