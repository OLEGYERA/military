import Vue from 'vue';

const Modules = {
    header: Vue.component('header-app', require('./modules/header.vue')),
    slider: Vue.component('slider-app', require('./modules/slider.vue')),
    footer: Vue.component('footer-app', require('./modules/footer.vue')),

    // footer: Vue.component('footer-welcome', require('./components/WelcomeMiracle/modules/footer.vue')),

}


export default Modules;