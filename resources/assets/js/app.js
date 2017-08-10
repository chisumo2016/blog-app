
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

Vue.component('posts', require('./components/posts.vue'));
let url = window.location.href;
let pageNumber = url.split('=')[1];
//console.log(page);

const app = new Vue({
    el: '#app',
    data:{   //Loops data=
        blog :{}
    },
     mounted(){

         axios.post('/getPosts',{
             'page' :pageNumber
         })

             .then(response => {
                 this.blog = response.data.data
                 console.log(response);
             })

             .catch(function (error) {
                 console.log(error);
             });
     }

});
