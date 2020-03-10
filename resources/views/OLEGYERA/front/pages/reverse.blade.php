<div class="military-info">
    <section class="about">
        <a class="img-full-box" style="background-image: url('../../img/officer-second.jpg');">
            <h2>Докладніше</h2>
        </a>
    </section>
    <div>
        <h1>
            Новини офіцерів Запасу
        </h1>
        <div class="military-news">
            @foreach($data as $item)
                <article class="military-new-article" v-for="item in news">
                    <a href="/{{$item->alias}}">
                        @if($item->image)
                            <div class="img-box" style="backgroundImage: 'url(/storage/images/{{$item->image}})'"></div>
                        @else
                            <div class="img-box" style="background-color: grey;"></div>
                        @endif
                        <div class="article-content">
                            <h3 class="article-title">{{$item->title}}</h3>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</div>