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
        <ul class="sf-menu bottom-layer">
            <li class="current">
                <router-link :to="{name: 'home'}">Головна</router-link>
            </li>
            <li>
                <a style="cursor: default;">Категорія офіцерів</a>
                <ul>
                    <li>
                        <router-link :to="{name: 'inventory_main'}" class="sf-with-ul">Підготовка офіцерів кадру</router-link>
                        <ul>
                            <li><a href="#">Разработка</a></li>
                            <li><a href="#">Разработка</a></li>
                        </ul>
                    </li>
                    <li>
                        <router-link :to="{name: 'reserve_main'}" class="sf-with-ul">Підготовка офіцерів запасу</router-link>
                        <ul>
                            <li><a href="#">Разработка</a></li>
                            <li><a href="#">Разработка</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Про кафедру</a>

            </li>
            <li>
                <a style="cursor: default;">Наука</a>
                <ul>
                    <li>
                        <a style="cursor: default;">Воєнно-наукове товариство</a>
                        <ul>
                            <li>
                                <router-link :to="{name: 'position'}">Положення</router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'sections'}">Розділи</router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <router-link :to="{name: 'contacts'}">Контакти</router-link>
            </li>
        </ul>
    </header>
</template>

<script>
    export default {
        mounted(){
            $(document).ready(function() {
                $('ul.sf-menu').superfish({
                    delay: 500,
                    animation: {opacity:'show'},
                    speed: 'fast',
                });
            });
        },
        data: function(){
            return{
                routeName: this.$route.name,
            }
        },
        watch: {
            '$route' (to, from) {
                this.routeName = this.$route.name;
            },
        }
    }
</script>