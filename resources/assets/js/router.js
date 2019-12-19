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
        {path: '/officer-category/:alias', component: C.officer_category},

        {path: '/officer-category/training-of-reserve-officers/main', component: C.reserve_main, name: 'reserve_main'},
        {path: '/officer-category/training-of-reserve-officers/news/:alias', component: C.officer_category_reverse_, name: 'reverse_spec'},
        {path: '/officer-category/training-of-reserve-officers/pages/:alias', component: C.reverse_page, name: 'reverse_common'},

        {path: '/officer-category/training-of-frame-officers/main', component: C.inventory_main, name: 'inventory_main'},
        {path: '/officer-category/training-of-frame-officers/news/:alias', component: C.officer_category, name: 'inventory_spec'},
        {path: '/officer-category/training-of-frame-officers/pages/:alias', component: C.inventory_page, name: 'inventory_common'},


        {path: '/reserve-officers', component: C.reserve_main, name: 'reserve_main'},
        {path: '/partnerships/Military-partnerships-partnership/position', component: C.position, name: 'position'},
        {path: '/partnerships/Military-partnerships-partnership/sections', component: C.sections, name: 'sections'},
        {path: '/contacts', component: C.contacts, name: 'contacts'},

    ]
})




export default router;