@foreach($menus as $menu)
    <li>
        @if(!empty($menu['child']) || $menu['page']->count() != 0)
            <a style="cursor: default;" class="sf-with-ul">{{$menu['parent']->name}}</a>
            <ul>
{{--                @php(dd($menu['parent']))--}}
                @include('OLEGYERA.front.components.menu.recursive_menu', ['menus' => $menu['child'], 'path' => $path . $menu['parent']->alias . '/' ])
                @foreach($menu['page'] as $item)
                    <li><a href="/{{$item->alias}}">{{$item->title}}</a></li>
                @endforeach
            </ul>
        @else
            @if($menu['parent']->alias == 'main')
                <a href="/{{$path}}{{$menu['parent']->alias}}">{{$menu['parent']->name}}</a>
            @else
                <a href="/{{$menu['parent']->alias}}">{{$menu['parent']->name}}</a>
            @endif
        @endif
    </li>
@endforeach