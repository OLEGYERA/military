@foreach($menus as $menu)
    <option value="{{$menu['parent']->id}}">
        @for($i=0; $i<$step; $i++)
            -
        @endfor
        {{$menu['parent']->name}}
    </option>

    @include(env('VIEW_PATH').'adm.menu.select', ['menus' => $menu['child'], 'step' => ++$step])
    <?php $step-- ?>
@endforeach
