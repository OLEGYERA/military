@foreach($menus as $menu)
    <option value="{{$menu['parent']->id}}" @if($menu['parent']->id == $cur_menu->parent) selected @endif  @if($menu['parent']->id == $cur_menu->id) disabled @endif>
        @for($i=0; $i<$step; $i++)
            -
        @endfor
        {{$menu['parent']->name}}
    </option>

    @include('OLEGYERA.adm.menu.selected', ['menus' => $menu['child'], 'cur_menu' => $cur_menu, 'step' => ++$step])
    <?php $step-- ?>
@endforeach
