import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component : require('./views/Login').default
    }
];

export default new VueRouter({
    routes
});