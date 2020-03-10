@extends('OLEGYERA.front.template.basicHTML')

@section('branding')
    {!! $branding ?? '' !!}
@endsection

@section('header')
    {!! $header ?? '' !!}
@endsection

@if($is_main)
    @section('basic')
        {!! $content ?? '' !!}
    @endsection
@else
    @section('basic')
        <main class="military-page">
            <section class="content">
                {!! $aside ?? ''!!}
                {!! $content ?? '' !!}
            </section>
        </main>
    @endsection
@endif


@section('module_price_section')
    {!! $module_price_section ?? '' !!}
@endsection

@section('slider')
    {!! $slider ?? '' !!}
@endsection

@section('footer')
    {!! $footer ?? '' !!}
@endsection

@if(!empty($jss))
@section('jss')
    {!! $jss !!}
@endsection
@endif

@if(!empty($targeting_url))
    @include('layouts.banners.targeting', ['url' => $targeting_url])
@endif

{{--@section('footer')--}}
{{--    {!! $footer !!}--}}
{{--@endsection--}}
