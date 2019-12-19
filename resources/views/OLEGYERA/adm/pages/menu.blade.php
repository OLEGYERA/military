@foreach($menus as $menu)
    @if($menu['parent']->drop == 0)
        <option value="{{$menu['parent']->id}}" disabled>
            @for($i=0; $i<$step; $i++)
                -
            @endfor
            {{$menu['parent']->name}}
        </option>
    @else
        <option value="{{$menu['parent']->id}}" @if($menu['parent']->id ==  $old_menu) selected @endif>
            @for($i=0; $i<$step; $i++)
                -
            @endfor
            {{$menu['parent']->name}}
        </option>
    @endif
    @include(env('VIEW_PATH').'adm.pages.menu', ['menus' => $menu['child'], 'old_menu' => $old_menu, 'step' => ++$step])
    <?php $step-- ?>
@endforeach
