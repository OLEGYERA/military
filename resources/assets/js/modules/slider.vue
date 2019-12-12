<template>
    <!--:autoPlay="true" :playSpeed="2000"-->
    <hooper  >
        <slide>
            <a href="#ss" class="ucc">
                <span class="first-row">Державна установа</span>
                <span class="second-row">“Урядовий контактний центр”</span>
            </a>
        </slide>
        <slide>
            <a href="#ss" class="mou">
                <span class="first-row">Міністерство оборони України</span>
                <span class="second-row">офіційний веб-сайт</span>
            </a>
        </slide>
        <hooper-navigation slot="hooper-addons"></hooper-navigation>
    </hooper>
</template>

<script>
    import { Hooper, Slide, Navigation as HooperNavigation} from 'hooper';

    export default {
        name: 'App',
        components: {
            Hooper,
            Slide,
            HooperNavigation
        }
    }
</script>