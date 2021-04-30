@extends('web.layouts.app')
@section('title')
    Технологический блок
@endsection

@section('content')


@include('web.include.tb.sidebar_tb')


    <div class="top_table">
   @include('web.include.toptable')

    </div>
<div class="inside_content">
@include('web.include.numbs_line')
@include('web.include.opo.tabs_opo')

</div>

@endsection
