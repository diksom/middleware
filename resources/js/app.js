import Vue from 'vue'
import store from './store.js'
import router from './router.js'
import App from './App.vue'
import vuetify from './plugins/vuetify.js'
import './bootstrap.js'
const app= new Vue({
    el:'#app',
    router,
    store,
    vuetify,
    components:{
        App
    },
});