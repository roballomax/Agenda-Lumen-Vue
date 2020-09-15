import Vue from 'vue';
import VueRouter from 'vue-router';

import _ from 'lodash';

import axios from 'axios';

window.Vue      = Vue;

Vue.use(VueRouter);

window._        = _;
window.axios    = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';