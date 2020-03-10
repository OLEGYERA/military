<div class="content-field">
    <div class="articles-box">
        <h1 class="page-title">Всі новини <a href="{{route('global_create_page')}}"> Додати сторінку</a></h1>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Назва</th>
                <th>Видимість</th>
                <th class="th-date">Дата створення</th>
                <th class="th-date">Дата Оновлення</th>

            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td><a href="{{route('global_edit_page', ['alias' => $page->alias])}}">{{$page->id}}</a></td>
                    <td><a href="{{route('global_edit_page', ['alias' => $page->alias])}}">{{$page->title}}</a></td>
                    <td><a href="{{route('global_edit_page', ['alias' => $page->alias])}}">{{$page->show}}</a></td>
                    <td><a href="{{route('global_edit_page', ['alias' => $page->alias])}}">{{$page->created_at}}</a></td>
                    <td><a href="{{route('global_edit_page', ['alias' => $page->alias])}}">{{$page->updated_at}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
