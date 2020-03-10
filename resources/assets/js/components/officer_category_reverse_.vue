<template>
    <main class="military-page">
        <section class="content">
            <aside class="militari-sidebar">
                <h2>Останні Сторінки</h2>
                <div class="military-last-news">
                    <article class="military-article-preview small revealator-slideright revealator-duration10 revealator-once" v-for="item in last_pages">
                        <div class="img-box"
                             :style="{ backgroundImage: 'url(/storage/images/' + item.image  + ')' }"
                             @click="jump('reverse_common', item.alias)"
                        ></div>
                        <div class="preview-content"  @click="jump('reverse_common', item.alias)">
                            <h3 class="preview-title">{{item.title}}</h3>
                        </div>
                    </article>
                </div>
            </aside>
            <div class="military-info" v-if="new_item">
                <h1 v-html="new_item.title"></h1>
                <div class="military-page-content" v-html="new_item.text"></div>
            </div>
        </section>
    </main>
</template>

<script>
    import {HTTP} from '../http.js'

    export default {
        mounted(){
            this.getLastPages();
            this.getNew(this.$route.params.alias);
            // this.getPage(this.$route.params.alias);
        },
        data: function(){
            return{
                // page: null,
                last_pages: null,
                new_item: null,
            }
        },
        methods: {
            // getPage(alias){
            //     HTTP.get(`page` + '/' + alias)
            //         .then(response => {
            //             this.page = response.data;
            //             document.title = this.page.title
            //         }).catch(error => {
            //         console.log(error);
            //     })
            // },

            getLastPages(){
                HTTP.get(`last-pages`)
                    .then(response => {
                        this.last_pages = response.data.data;
                        console.log(this.last_pages);
                        document.title = 'Головна сторінка Офіцерів запасу'
                    }).catch(error => {
                    console.log(error);
                })
            },
            getNew(alias){
                HTTP.get(`reserve-new` + '/' + alias)
                    .then(response => {
                        this.new_item = response.data;
                        console.log(this.new_item);
                    }).catch(error => {
                    console.log(error);
                })
            },
            jump(name, alias){
                this.$router.push({ name: name, params: { alias } })
            }
        },

    }
</script>