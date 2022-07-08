/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 import Vue from 'vue';

 import AppComponent from './components/AppComponent.vue'
 import AnimalComponent from './components/AnimalComponent.vue'
 import CreateAnimalComponent from './components/CreateAnimalComponent.vue'
 import KindComponent from './components/KindComponent.vue'
 import ViewAnimalsComponent from './components/ViewAnimalsComponent.vue'

 window.Vue = require('vue').default;
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
Vue.component('appcomponent', AppComponent);
Vue.component('animalcomponent', AnimalComponent);
Vue.component('createanimalcomponent', CreateAnimalComponent);
Vue.component('kindcomponent', KindComponent);
Vue.component('viewanimalscomponent', ViewAnimalsComponent);

 const app = new Vue({
     el: '#app',
 });
 
 
 