<div class="content-field">
    <div class="articles-box">
        <h1 class="page-title">Всі новини <a href="{{route('create_article')}}"> Додати новину</a></h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Назва</th>
                    <th>Категорія</th>
                    <th>Закріплено</th>
                    <th>Видимість</th>
                    <th class="th-date">Дата створення</th>
                    <th class="th-date">Дата Оновлення</th>
                    <th class="th-date">Управление</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->id}}</a></td>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->title}}</a></td>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->category}}</a></td>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->fix}}</a></td>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->show}}</a></td>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->created_at}}</a></td>
                        <td><a href="{{route('edit_article', ['alias' => $article->alias])}}">{{$article->updated_at}}</a></td>
                        <td><a class="btn-delete" href="{{route('delete_article', ['alias' => $article->alias])}}">Удалить</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
