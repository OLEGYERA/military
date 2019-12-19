<template>
    <header class="military-header">
        <div class="top-layer">
            <div class="layer-bg"></div>
            <div class="military-logotypes">
                <router-link :to="{name: 'home'}"><img src="img/logo/logo.png" alt=""></router-link>
                <a href="https://nau.edu.ua/">
                    <img src="img/logo/contacts.png" alt="">
                </a>
            </div>
        </div>
        <ul class="sf-menu bottom-layer" v-html="header">

        </ul>
    </header>
</template>

<script>
    import {HTTP} from '../http.js'

    export default {
        mounted(){
            this.getMenu();
        },
        data: function(){
            return{
                header: null,
            }
        },
        methods: {
            getMenu(){
                HTTP.get(`menu`)
                    .then(response => {
                       this.header = response.data;
                        $('ul.sf-menu').superfish({
                            delay: 500,
                            animation: {opacity:'show'},
                            speed: 'fast',
                        });
                    }).catch(error => {
                    console.log(error);
                })
            },
        },
        watch: {
            '$route' (to, from) {
                this.routeName = this.$route.name;
            },
        }
    }
</script>