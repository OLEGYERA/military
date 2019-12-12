import Vue from 'vue';

const Components = {
    app: Vue.component('app', require('./components/App.vue')),
    home: Vue.component('home', require('./components/home.vue')),
    inventory_main: Vue.component('home', require('./components/inventoryOfficers/main.vue')),
    reserve_main: Vue.component('home', require('./components/reserveOfficers/main.vue')),
    position: Vue.component('position', require('./components/science/partnerships/position')),
    sections: Vue.component('sections', require('./components/science/partnerships/sections')),
    contacts: Vue.component('contacts', require('./components/contacts.vue')),
}


export default Components;