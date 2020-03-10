<div class="content-field">
    <form action="{{route('global_edit_page', ['alias' => $page->alias])}}" method="POST" class="article-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="main-column">
            <div class="titles-row">
                <h1 class="page-title">Редагувати сторінку</h1>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                @if ($errors->has('alias'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alias') }}</strong>
                    </span>
                @endif
                <input type="text" name="title" placeholder="Введіть заголовок" required class="ru-title" value="{{old('title') ?? $page->title}}">
                <input type="hidden" name="alias" id="alias" required class="eng-alias" value="{{old('alias')}}">

            </div>
            <div class="media-row">
                @if ($errors->has('text'))
                    <span class="help-block">
                        <strong>{{ $errors->first('text') }}</strong>
                    </span>
                @endif
                <textarea name="text" id="text">
                        {{old('text') ?? $page->text}}
                </textarea>
            </div>
        </div>
        <div class="aside-column">
            <div class="article-menu">
                <h2 class="page-title">Налаштування</h2>

                <div class="menu-row">
                    @if(old('show'))
                        <input type="checkbox" name="show" id="show" class="adm-checkbox" {{ old('show') ? 'checked' : ''}}>
                    @else
                        @if($page->show == 1)
                            <input type="checkbox" name="show" id="show" class="adm-checkbox" checked>
                        @else
                            <input type="checkbox" name="show" id="show" class="adm-checkbox">
                        @endif
                    @endif
                    <label for="show">Видимість</label>
                </div>
                <div class="menu-row" style="display: flex; flex-direction: column; align-items: flex-start">
                    <label for="menu" style="margin-left: 0px; margin-bottom: 5px">Меню</label>
                    <select name="menu" id="menu" style="width: 100%;">
                        @foreach($menus as $menu)
                            @if($menu['parent']->drop == 0)
                                <option value="{{$menu['parent']->id}}" disabled >{{$menu['parent']->name}}</option>
                            @else
                                <option value="{{$menu['parent']->id}}"
                                        @if(!empty(old('menu')))
                                            @if($menu['parent']->id == old('menu'))
                                                selected
                                            @endif
                                        @else
                                            @if($menu['parent']->id == $page->menu)
                                                selected
                                            @endif
                                        @endif
                                        >
                                    {{$menu['parent']->name}}</option>
                            @endif
                            <?php
                                if(!empty(old('menu')))  {
                                    $od = old('menu');
                                }else{
                                    $od = $page->menu;
                                }
                            ?>
                            {{$od}}
                            @include('OLEGYERA.adm.pages.menu', ['menus' => $menu['child'], 'old_menu' => $od, 'step' => 1])
                        @endforeach
                    </select>
                </div>
                <div class="menu-row btn-row">
                    <a class="btn disabled">Переглянути</a>
                    <button class="btn btn-success">Зберегти</button>
                </div>
            </div>
            <div class="article-img">
                <h2 class="page-title">Загрузити зображення</h2>
                <img src="{{asset('storage/images/' . $page->image)}}" alt="">
                <input type="file" name="image" id="image">
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
                <label for="image">Виберіть зображення </label>
            </div>
        </div>
    </form>
</div>


<!-- подключаем bootstrap.js -->

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- подключаем сам summernote -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>

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