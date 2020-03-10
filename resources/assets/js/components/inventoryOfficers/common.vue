<template>
    <main class="military-page">
        <section class="content">
            <aside class="militari-sidebar">
                <h2>Новини</h2>
                <div class="military-last-news">
                    <article class="military-article-preview small revealator-slideright revealator-duration10 revealator-once" v-for="item in news">
                        <div class="img-box"
                             :style="{ backgroundImage: 'url(../../storage/images/' + item.image  + ')' }"
                             @click="jump('reverse_common', item.alias)"
                        ></div>
                        <div class="preview-content" @click="jump('reverse_common', item.alias)">
                            <h3 class="preview-title">{{item.title}}</h3>
                        </div>
                    </article>
                </div>
            </aside>
            <div class="military-info" v-if="page">
                <h1 v-html="page.title"></h1>
                <div class="military-page-content" v-html="new_item.text"></div>
            </div>
        </section>
    </main>
</template>

<script>
    import {HTTP} from '../../http.js'

    export default {
        mounted(){
            this.getNews();
            this.getPage(this.$route.params.alias);
        },
        data: function(){
            return{
                news: null,
                page: null,
            }
        },
        methods: {
            getPage(alias){
                HTTP.get(`page` + '/' + alias)
                    .then(response => {
                        this.page = response.data;
                        document.title = this.page.title
                    }).catch(error => {
                    console.log(error);
                })
            },
            getNews(){
                HTTP.get(`inventory-news`)
                    .then(response => {
                        this.news = response.data.data;
                        console.log(this.news);
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