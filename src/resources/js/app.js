'use strict';
import './bootstrap';
import router from './routes';

Vue.material.locale = {
   startYear      : 1900,
   endYear        : 2099,
   dateFormat     : 'dd/MM/yyyy',
   days           : ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
   shortDays      : ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
   shorterDays    : ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
   months         : ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
   shortMonths    : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
   shorterMonths  : ['J', 'F', 'M', 'A', 'M', 'Ju', 'Ju', 'A', 'Se', 'O', 'N', 'D'],
   firstDayOfAWeek: 0,
   cancel         : 'Cancelar',
   confirm        : 'Ok'
 }

 const linkActiveClass = 'my-link-active-class'
 Vue.material.router.linkActiveClass = linkActiveClass

new Vue({
   name: 'Root',
   router,
   el : '#app',
   components : {},
   data : {
      token : null
   },
   components : {
      setToken() {
         this.token = '123abc';
      }
   }

});