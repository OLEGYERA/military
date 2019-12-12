@extends(env('VIEW_PATH').'template.adm', ['is_auth' => $is_auth])

@section('header')
    {!! $header ?? '' !!}
@endsection

@section('aside')
    {!! $aside ?? ''!!}
@endsection

@section('content')
    {!! $content ?? '' !!}
@endsection

{{--@if(!empty($aside))--}}
{{--    @section('aside')--}}
{{--        {!! $aside!!}--}}
{{--    @endsection--}}
{{--@endif--}}


@section('footer')
    {!! $footer ?? '' !!}
@endsection