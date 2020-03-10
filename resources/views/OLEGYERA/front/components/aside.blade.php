<aside class="militari-sidebar">
    <h2>{{$title}}</h2>
    <div class="military-last-news">
        @foreach($data as $item)
            <article class="military-article-preview small revealator-slideright revealator-duration10 revealator-once">
                <a href="{{$menu_name}}/{{$item->alias}}">
                    @if($item->image)
                        <div class="img-box" style="backgroundImage: 'url(/storage/images/{{$item->image}})'"></div>
                    @else
                        <div class="img-box"></div>
                    @endif
                    <div class="preview-content">
                        <h3 class="preview-title">{{$item->title}}</h3>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
</aside>
