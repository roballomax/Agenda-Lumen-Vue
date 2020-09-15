'use strict';
import './bootstrap';
import router from './routes';

new Vue({
   router,
   el : '#app',
   components : {},

   data : {
      token : null
   }
});