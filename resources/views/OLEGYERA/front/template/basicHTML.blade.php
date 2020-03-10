<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="canonical" href="{{Request::url().'/'}}">

    @if(!empty($seo->seo_description))
        <meta name="description" content="{{ $seo->seo_description }}">
    @else
        <meta name="description" content="{{$description_default_seo ?? env('APP_NAME')}}">
    @endif
    @if(!empty($seo->og_title))
        <meta property="og:title" content="{{ $seo->og_title }}"/>
    @endif
    @if(!empty($seo->og_description))
        <meta property="og:description" content="{{ $seo->og_description }}"/>
    @endif
    {{--    @if(\Request::route()->getName()=='medicine' || \Request::route()->getName()=='medicine_ua')--}}
    {{--       <link rel="amphtml" href="{{ url()->current() }}/amp">--}}
    {{--    @endif--}}
    <meta property="og:url" content="{{ url()->current() }}"/>
    @if(!empty($seo->og_image))
        <meta property="og:image" content="{{ $seo->og_image }}"/>
    @endif
    {{--check title expression--}}
    @if(!empty($seo->seo_title))
        <title>{{ $seo->seo_title}}</title>
    @else
        <title>{{ $title ?? env('APP_NAME') }}</title>
        {{--<title>{{ preg_replace('/^([ ]+)|([ ]){2,}/m', '$2', str_limit($title ?? env('APP_NAME'),65)) ?? env('APP_NAME') }}</title>--}}
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="initial-scale=1.0, width=device-width user-scalable=no">
    <link href="{{ asset('/') }}favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('css/FrontBox/basic-page.css') }}">

    <!-- Load CSS -->
    <script>
        function loadCSS(hf) {
            var ms=document.createElement("link");ms.rel="stylesheet";
            ms.href=hf;document.getElementsByTagName("head")[0].appendChild(ms);
        }
        loadCSS("{{ asset('fonts/Roboto/roboto.css') }}");
        loadCSS("{{ asset('lib/superfish/css/superfish.css') }}");
        loadCSS("{{ asset('css/app.css') }}");
    </script>
</head>
<body id="app">
@yield('jss')

{{--<div class="loading">Загрузка</div>--}}
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQFT956"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="military-nau">
    @yield('header')
    @yield('basic')

    @if(!empty($seo) && !empty($seo->seo_text))
        <div class="SEO-text">
            {!! $seo->seo_text !!}
        </div>
    @endif
    @yield('footer')
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
<!-- Load Scripts -->
<script>var scr = {"scripts":[
            {"src" : "{{ asset('lib/superfish/js/jquery.js')}}", "async" : false},
            {"src" : "{{ asset('lib/superfish/js/hoverIntent.js')}}", "async" : false},
            {"src" : "{{ asset('lib/superfish/js/superfish.js')}}", "async" : false},
            {"src" : "{{ asset('js/relevator.js')}}", "async" : false},
            {"src" : "{{ asset('js/military.js')}}", "async" : false},
        ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
</body>
</html>
