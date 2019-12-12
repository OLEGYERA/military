import M from './modules.js';
import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    mode: 'history',
    routes: [
        {path: '/', component: C.home, name: 'home'},
        {path: '/inventory-officers', component: C.inventory_main, name: 'inventory_main'},
        {path: '/reserve-officers', component: C.reserve_main, name: 'reserve_main'},
        {path: '/partnerships/Military-partnerships-partnership/position', component: C.position, name: 'position'},
        {path: '/partnerships/Military-partnerships-partnership/sections', component: C.sections, name: 'sections'},
        {path: '/contacts', component: C.contacts, name: 'contacts'},

    ]
})




export default router;