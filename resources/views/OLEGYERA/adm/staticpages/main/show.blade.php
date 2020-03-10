<div class="content-field">
    <div class="standart-box">
        <h1 class="page-title">Зображення категорія офіцерів</h1>
        <div class="box-row">
            <div class="box-2-col">
                <h3>Категорія офіцерів запасу</h3>
                <div class="box-img" @if($img_one)style="background-image: url({{asset('storage/static/' . $img_one->path)}});" @endif></div>
                <form class="box-manage-row" action="{{route('global_main_edit_category')}}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                    <input type="hidden" name="type" value="1">
                    <input type="file" name="image" id="image-1">
                    <label for="image-1">Виберіть зображення</label>
                    <button>Зберегти</button>
                </form>
            </div>
            <div class="box-2-col">
                <h3>Категорія офіцерів кадру</h3>
                <div class="box-img" @if($img_two)style="background-image: url({{asset('storage/static/' . $img_two->path)}});" @endif></div>
                <form class="box-manage-row" action="{{route('global_main_edit_category')}}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                    <input type="hidden" name="type" value="2">
                    <input type="file" name="image" id="image-2">
                    <label for="image-2">Виберіть зображення</label>
                    <button>Зберегти</button>
                </form>
            </div>
        </div>
    </div>
    <div class="standart-box">
        <h2 class="page-title">Слайдер</h2>
        <form class="box-manage-row" action="{{route('global_main_add_slider')}}" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            @if ($errors->has('slider'))
                <span class="help-block">
                    <strong>{{ $errors->first('slider') }}</strong>
                </span>
            @endif
            <input type="file" name="slider" id="slider">
            <label for="slider">Виберіть зображення</label>
            <button>Зберегти</button>
        </form>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Зображення</th>
                <th class="th-date">Дата створення</th>
                <th class="th-date">Дата Оновлення</th>
                <th>Менеджер</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td><a>{{$slider->id}}</a></td>
                    <td><span class="box-img" style="background-image: url({{asset('storage/slider/' . $slider->path)}});"></span></td>
                    <td>{{$slider->created_at}}</td>
                    <td>{{$slider->updated_at}}</td>
                    <td><a href="{{route('global_main_delete_slider', ['id' => $slider->id])}}">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
