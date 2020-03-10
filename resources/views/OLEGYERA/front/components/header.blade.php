<header class="military-header">
    <div class="top-layer">
        <div class="layer-bg"></div>
        <div class="military-logotypes">
            <router-link :to="{name: 'home'}"><img src="/img/logo/logo.png" alt=""></router-link>
            <a href="https://nau.edu.ua/">
                <img src="/img/logo/contacts.png" alt="">
            </a>
        </div>
    </div>
    <ul class="sf-menu bottom-layer">
        @include('OLEGYERA.front.components.menu.menu')
    </ul>
</header>