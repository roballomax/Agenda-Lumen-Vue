import Vue from 'vue';
import VueRouter from 'vue-router';

import _ from 'lodash';

import axios from 'axios';

import { MdButton, MdContent, MdTabs } from 'vue-material/dist/components';
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css';
import 'vue-material/dist/theme/default-dark.css';


window.Vue      = Vue;

Vue.use(VueRouter);
Vue.use(VueMaterial);
Vue.use(MdButton);
Vue.use(MdContent);
Vue.use(MdTabs);

window._        = _;
window.axios    = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';