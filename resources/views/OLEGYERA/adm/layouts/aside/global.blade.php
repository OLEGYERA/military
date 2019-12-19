<aside class="adm-aside">
    <ul class="nav-aside">
        <li>
            <span class="li-group">
                <span class="main-link" ><i class="fas fa-columns"></i>Головна</span>

                @if(Route::currentRouteName() == 'global_dashboard')
                    <a class="active">Статистика</a>
                @else
                    <a href="{{route('global_dashboard')}}">Статистика</a>
                @endif
            </span>
        </li>
        <li>
            <span class="li-group">
                <span class="main-link" ><i class="far fa-newspaper"></i>Новини</span>

                @if(Route::currentRouteName() == 'global_articles')
                    <a class="active">Всі новини</a>
                @else
                    <a href="{{route('global_articles')}}">Всі новини</a>
                @endif

                @if(Route::currentRouteName() == 'create_article')
                    <a class="active">Додати новину</a>
                @else
                    <a href="{{route('create_article')}}">Додати новину</a>
                @endif
            </span>
        </li>
        <li>
            <span class="li-group">
                <span class="main-link"><i class="fas fa-compass"></i>Меню</span>

                @if(Route::currentRouteName() == 'global_manage_menu')
                    <a class="active">Менеджер Меню</a>
                @else
                    <a href="{{route('global_manage_menu')}}">Менеджер Меню</a>
                @endif
            </span>
        </li>
        <li>
            <span class="li-group">
                <span class="main-link"><i class="fas fa-puzzle-piece"></i>Cторінки</span>

                @if(Route::currentRouteName() == 'global_show_main')
                    <a class="active">Головна (статична)</a>
                @else
                    <a href="{{route('global_show_main')}}">Головна (статична)</a>
                @endif

                @if(Route::currentRouteName() == 'global_all_show')
                    <a class="active">Всі сторінки</a>
                @else
                    <a href="{{route('global_all_show')}}">Всі сторінки</a>
                @endif

                @if(Route::currentRouteName() == 'global_create_page')
                    <a class="active">Додати сторінку</a>
                @else
                    <a href="{{route('global_create_page')}}">Додати Сторінку</a>
                @endif
            </span>


        </li>

{{--        @if(Route::currentRouteName() == 'global_show_reverse')--}}
{{--            <a class="active">Офіцери запасу</a>--}}
{{--        @else--}}
{{--            <a href="{{route('global_show_reverse')}}">Офіцери запасу</a>--}}
{{--        @endif--}}

{{--        @if(Route::currentRouteName() == 'global_show_frame')--}}
{{--            <a class="active">Офіцери кадру</a>--}}
{{--        @else--}}
{{--            <a href="{{route('global_show_frame')}}">Офіцери кадру</a>--}}
{{--        @endif--}}

{{--        @if(Route::currentRouteName() == 'global_show_department')--}}
{{--            <a class="active">Про кафедру</a>--}}
{{--        @else--}}
{{--            <a href="{{route('global_show_department')}}">Про кафедру</a>--}}
{{--        @endif--}}

{{--        @if(Route::currentRouteName() == 'global_show_science')--}}
{{--            <a class="active">Наука</a>--}}
{{--        @else--}}
{{--            <a href="{{route('global_show_science')}}">Наука</a>--}}
{{--        @endif--}}
    </ul>
</aside>