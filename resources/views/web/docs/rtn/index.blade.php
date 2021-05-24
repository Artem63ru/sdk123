@extends('web.layouts.app')
@section('title')
    Справка
@endsection

@section('content')


@include('web.include.sidebar_doc')


    <div class="top_table">
  @include('web.include.toptable')
    </div>

<div class="inside_content">
    @include('web.docs.rtn.iclude.doc_header')
    <div class="tabs razd_col_tab">

    @livewire('rtn.action-plan')
    </div>
</div>

@endsection
