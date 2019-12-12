<template>
    <div class="military-nau">
        <header-app></header-app>
        <router-view></router-view>
        <footer-app></footer-app>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        watch: {
            '$route' (to, from) {
                console.log(from);
            }
        }
    }
</script>