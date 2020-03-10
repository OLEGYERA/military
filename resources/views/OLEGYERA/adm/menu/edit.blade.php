<div class="content-field">
    <div class="standart-box">
        <h1 class="page-title">Редагувати меню</h1>
        <form class="box-row menu-form" action="{{route('global_edit_menu', ['id' => $cur_menu->id])}}" method="POST">
            {{ csrf_field() }}
            <select name="parent" required>
                @foreach($menus as $menu)
                    @if($menu['parent']->drop == 0)
                        <option value="{{$menu['parent']->id}}" disabled>{{$menu['parent']->name}}</option>
                    @else
                        <option value="{{$menu['parent']->id}}" @if($menu['parent']->id == $cur_menu->parent) selected @endif @if($menu['parent']->id == $cur_menu->id) disabled @endif>{{$menu['parent']->name}}</option>
                    @endif
                    @include('OLEGYERA.adm.menu.selected', ['menus' => $menu['child'], 'cur_menu' => $cur_menu, 'step' => 1])
                @endforeach
            </select>
            <input type="name" name="name" placeholder="Назва випадаючого меню" value="{{$cur_menu->name}}" required class="ru-title">
            <input type="hidden" name="alias" required class="eng-alias" value="{{$cur_menu->alias}}">
            <button>Зберегти</button>
        </form>
    </div>
</div>

<script>

    $(".ru-title").on("paste keyup change", function() {
        var e = ""
            , h = $(this).val().toLowerCase()
            , n = [];
        0 < h.length && h.split(" ").map(function(e) {
            0 < e.length && "й" != e && n.push(e)
        }),
            h = n.join(" ");
        var a = [["а", "a"], ["б", "b"], ["в", "v"], ["г", "g"], ["д", "d"], ["е", "e"], ["ё", "yo"], ["ж", "zh"], ["з", "z"], ["и", "i"], ["й", "y"], ["к", "k"], ["л", "l"], ["м", "m"], ["н", "n"], ["о", "o"], ["п", "p"], ["р", "r"], ["с", "s"], ["т", "t"], ["у", "u"], ["ф", "f"], ["х", "h"], ["ц", "c"], ["ч", "ch"], ["ш", "sh"], ["щ", "shch"], ["ъ", ""], ["ы", "y"], ["ь", ""], ["э", "e"], ["ю", "yu"], ["я", "ya"], [" ", "-"], ["і", "i"], ["a", "a"], ["b", "b"], ["c", "c"], ["d", "d"], ["e", "e"], ["f", "f"], ["g", "g"], ["h", "h"], ["i", "i"], ["j", "j"], ["k", "k"], ["l", "l"], ["m", "m"], ["n", "n"], ["o", "o"], ["p", "p"], ["q", "q"], ["r", "r"], ["s", "s"], ["t", "t"], ["u", "u"], ["v", "v"], ["w", "w"], ["x", "x"], ["y", "y"], ["z", "z"], [" ", "-"], ["0", "0"], ["1", "1"], ["2", "2"], ["3", "3"], ["4", "4"], ["5", "5"], ["6", "6"], ["7", "7"], ["8", "8"], ["9", "9"], ["-", "-"]];
        for (i = 0; i < h.length; i++)
            for (j = 0; j < a.length; j++)
                h.charAt(i) == a[j][0] && (e += a[j][1]);
        hesh = /-{2,}/g,
            newChange = e.replace(hesh, "-"),
            $(".eng-alias").val(newChange)
    });


</script>
