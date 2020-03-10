@foreach($menus as $menu)
    @if($menu['parent']->id == 1)
        <li>
            <a href="/">Головна</a>
        </li>
    @else
        <li>
            @if(!empty($menu['child']) || $menu['page']->count() != 0)
                <a style="cursor: default;" class="sf-with-ul">{{$menu['parent']->name}}</a>
                <ul>
                    @include('OLEGYERA.front.components.menu.recursive_menu', ['menus' => $menu['child'], 'path' => $menu['parent']->alias . '/'])
                    @foreach($menu['page'] as $item)
                        <li><a href="/{{$item->alias}}">{{$item->title}}</a></li>
                    @endforeach
                </ul>
            @else
                <a href="/{{$menu['parent']->alias}}">{{$menu['parent']->name}}</a>
            @endif
        </li>
    @endif
@endforeach
