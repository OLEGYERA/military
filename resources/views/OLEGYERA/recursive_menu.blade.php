@foreach($menus as $menu)
    <li>
        @if(!empty($menu['child']) || $menu['page']->count() != 0)
            <a style="cursor: default;" class="sf-with-ul">{{$menu['parent']->name}}</a>
            <ul>
                @include(env('VIEW_PATH').'recursive_menu', ['menus' => $menu['child'], 'path' => $path . $menu['parent']->alias . '/' ])
                @foreach($menu['page'] as $item)
                    <li><a href="{{url('/')}}/{{$path}}{{$menu['parent']->alias}}/{{$item->alias}}">{{$item->title}}</a></li>
                @endforeach
            </ul>
        @else
            <a href="{{url('/')}}/{{$path}}{{$menu['parent']->alias}}">{{$menu['parent']->name}}</a>
        @endif
    </li>
@endforeach