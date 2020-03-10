@foreach($menus as $menu)
    <div class="menu-item">
        <h3 class="title s{{$step}}">
            {{$menu['parent']->name}}
        </h3>
        @if($menu['parent']->delete == 0)
            <div class="manage-row">
                <a class="btn-edit disabled">Редагувати</a>
                <a class="btn-delete disabled">Видалити</a>
            </div>
        @else
            <div class="manage-row">
                <a href="{{route('global_edit_menu', ['id' => $menu['parent']->id ])}}" class="btn-edit">Редагувати</a>
                <a href="{{route('global_delete_menu', ['id' => $menu['parent']->id ])}}" class="btn-delete">Видалити</a>
            </div>
        @endif
    </div>
    @include('OLEGYERA.adm.menu.choose_select', ['menus' => $menu['child'], 'step' => ++$step])
    <?php $step-- ?>
@endforeach
