
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

Vue.component('Inventario-component',require('./components/InventarioComponent.vue'));

const app = new Vue({
    el: '#app', 
    data: {
        seccion_id : 0,
        seleccionar_seccion: 0,
        seleccionar_serie: 0,
        secciones: [],        
        sub_secciones:[],
        series:[],
        sub_series:[],
        probar:0
    },
    created: function () {
        this.mostrarSubSecciones() 
        this.mostrarSerie() 
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
            axios.get('sub-secciones/' + this.seleccionar_seccion).then(response => {
                this.sub_secciones = response.data;
            }).catch(error => {
                console.log(error);
            }); 
        },
        mostrarSerie: function () {            
            axios.get('series/list').then(response => {                               
                 this.series = response.data;                               
            }).catch(error => {
                 console.log(error);
            });           
            
         },
         cargarSubSeries: function(){              
             axios.get('sub-series/' + this.seleccionar_serie).then(response => {
                 this.sub_series = response.data;
             }).catch(error => {
                 console.log(error);
             }); 
         }
        
    }   
});


