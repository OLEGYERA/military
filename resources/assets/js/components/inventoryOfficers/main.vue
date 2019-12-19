<template>
    <main class="military-page">
        <section class="about">
            <a class="img-full-box" style="background-image: url('../../img/officer-first.jpg');">
                <h2>Докладніше</h2>
            </a>
        </section>
        <section class="content">
            <aside class="militari-sidebar">
                <h2>Останні Сторінки</h2>
                <div class="military-last-news">
                    <article class="military-article-preview small revealator-slideright revealator-duration10 revealator-once" v-for="item in last_pages">
                        <div class="img-box"
                             :style="{ backgroundImage: 'url(../../storage/images/' + item.image  + ')' }"
                             @click="jump('reverse_spec', item.alias)"
                        ></div>
                        <div class="preview-content">
                            <h3 class="preview-title">{{item.title}}</h3>
                        </div>
                    </article>
                </div>
            </aside>
            <div class="military-info">
                <h1>
                    Новини офіцерів Кадру
                </h1>
                <div class="military-news">
                    <article class="military-new-article" v-for="item in news">
                        <div class="img-box"
                             :style="{ backgroundImage: 'url(../../storage/images/' + item.image  + ')' }"
                             @click="jump('reverse_spec', item.alias)"
                        ></div>
                        <div class="article-content" @click="jump('reverse_spec', item.alias)">
                            <h3 class="article-title">{{item.title}}</h3>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
    import {HTTP} from '../../http.js'

    export default {
        mounted(){
            this.getLastPages();
            this.getNews();
        },
        data: function(){
            return{
                last_pages: null,
                news: null,
            }
        },
        methods: {
            getLastPages(){
                HTTP.get(`last-pages`)
                    .then(response => {
                        this.last_pages = response.data.data;
                        console.log(this.last_pages);
                        document.title = 'Головна сторінка Офіцерів кадру'
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