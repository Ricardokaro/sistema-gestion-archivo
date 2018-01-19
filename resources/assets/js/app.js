
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component',require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app', 
    data: {
        seccion_id : 0,
        seleccionar_seccion: 0,
        secciones: [],
        sub_secciones:[]
    },
    created: function () {
        this.mostrarSubSecciones()  
    },    
    methods:{
        mostrarSubSecciones: function () {
           
           axios.get('secciones/list').then(response => {                               
                this.secciones = response.data;                               
           }).catch(error => {
                console.log(error);
           });           
           
        },
        cargarSubSecciones: function(){              
            axios.get('sub-secciones/list').then(response => {
                this.sub_secciones = response.data;
            }).catch(error => {
                console.log(error);
            }); 
        }
    }   
});


