@extends('web.layouts.app')
@section('title')
    Технологический блок
@endsection

@section('content')
{{--    <script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--    <script type="text/javascript" src="/js/charts/chart_column_PK.js"></script>--}}
{{--    <script type="text/javascript" src="/js/charts/chart_column_event.js"></script>--}}

{{--@include('web.include.tb.sidebar_tb')--}}


    <div class="top_table">
    </div>
  @include('upload-form')

{{--        @livewire('calc-koef')--}}





@endsection
