require('./bootstrap');

window.Vue = require('vue');
import Routes from './router.js'
import {store} from './store';

/*Plugins*/
import Vuebar from 'vuebar';
Vue.use(Vuebar);

const app = new Vue({
    el: '#app',
    router: Routes,
    store: store,
});