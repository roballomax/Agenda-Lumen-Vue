import VueRouter from 'vue-router';

const linkActiveClass = 'my-link-active-class'
let routes = [
    {
        path: '/',
        component : require('./views/Login').default
    },{
        path: '/contatos',
        component : require('./views/Contatos').default
    },
];

export default new VueRouter({
    routes,
    linkActiveClass
});