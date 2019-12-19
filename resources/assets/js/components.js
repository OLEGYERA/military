import Vue from 'vue';

const Components = {
    app: Vue.component('app', require('./components/App.vue')),
    home: Vue.component('home', require('./components/home.vue')),
    inventory_main: Vue.component('home', require('./components/inventoryOfficers/main.vue')),
    reserve_main: Vue.component('home', require('./components/reserveOfficers/main.vue')),
    position: Vue.component('position', require('./components/science/partnerships/position')),
    sections: Vue.component('sections', require('./components/science/partnerships/sections')),
    contacts: Vue.component('contacts', require('./components/contacts.vue')),

    officer_category: Vue.component('officer_category', require('./components/officer_category.vue')),
    reverse_common: Vue.component('reverse_common', require('./components/reserveOfficers/common.vue')),
    inventory_common: Vue.component('inventory_common', require('./components/inventoryOfficers/common.vue')),
    officer_category_reverse_: Vue.component('officer_category', require('./components/officer_category_reverse_.vue')),
    reverse_page: Vue.component('reverse_common', require('./components/reserveOfficers/common.vue')),
    inventory_page: Vue.component('reverse_common', require('./components/inventoryOfficers/common.vue')),
}


export default Components;