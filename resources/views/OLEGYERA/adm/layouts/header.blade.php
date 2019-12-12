<header class="adm-header">
    <div class="bread-crumbs">
        <span class="kvp-logo"><a href="">КВП</a></span>
        <ul class="crumbs">
            @if(!isset($header_var))
                <li class="crumb-item"><a>Авторизация</a></li>
            @else
                @foreach($header_var as $item)
                    <li class="crumb-item"><a href="{{route($item['link'])}}">{{$item['title']}}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="user">
        <a href="{{ url('/logout') }}"
           onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
            Выйти
        </a>

        <form id="logout-form" action="{{ route('logout') }}"
              method="POST"style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</header>
<div class="ghost-header"></div>