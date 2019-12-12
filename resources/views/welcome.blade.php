<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('fonts/Raleway/raleway.css')}}">
        <link rel="stylesheet" href="{{asset('css/relevator.css')}}">
        <script src="https://kit.fontawesome.com/d220411603.js" crossorigin="anonymous"></script>
{{--        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        <link rel="stylesheet" media="screen" href="{{asset('lib/superfish/css/superfish.css')}}">
        <script src="{{asset('lib/superfish/js/jquery.js')}}"></script>
        <script src="{{asset('lib/superfish/js/hoverIntent.js')}}"></script>
        <script src="{{asset('lib/superfish/js/superfish.js')}}"></script>
        <script src="{{asset('js/relevator.js')}}"></script>

    </head>
    <body>
       <div id="app">
           <app></app>
       </div>
       <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
