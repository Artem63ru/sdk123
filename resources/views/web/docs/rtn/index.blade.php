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
{{--        <div class="tab">--}}
{{--            <input type="radio" id="r11" name="tab_group">--}}
{{--            <label for="r11" class="tab_title razd_col_tab">Раздел 1.1</label>--}}
          @livewire('rtn.action-plan')
{{--        </div>--}}

           @livewire('rtn.data-check')

        <div class="tab">
            <input type="radio" id="r22" name="tab_group">
            <label for="r22" class="tab_title razd_col_tab">Раздел 2.2</label>
                @livewire('rtn.pm')
        </div>
        <div class="tab">
            <input type="radio" id="r31" name="tab_group">
            <label for="r31" class="tab_title razd_col_tab">Раздел 3.1</label>
        @livewire('rtn.report-t-u')
        </div>
        <div class="tab">
            <input type="radio" id="r41" name="tab_group">
            <label for="r41" class="tab_title razd_col_tab">Раздел 4.1</label>
        @livewire('rtn.report-worker')
        </div>
        <div class="tab">
            <input type="radio" id="r42" name="tab_group">
            <label for="r42" class="tab_title razd_col_tab">Раздел 4.2</label>
        @livewire('rtn.report-worker-cert')
        </div>
        <div class="tab">
            <input type="radio" id="r43" name="tab_group">
            <label for="r43" class="tab_title razd_col_tab">Раздел 4.3</label>
        @livewire('rtn.report-worker-p-k')
        </div>
        <div class="tab">
            <input type="radio" id="r51" name="tab_group">
            <label for="r51" class="tab_title razd_col_tab">Раздел 5.1</label>
        @livewire('rtn.data-check-out')
        </div>
        <div class="tab">
            <input type="radio" id="r52" name="tab_group">
            <label for="r52" class="tab_title razd_col_tab">Раздел 5.2</label>
        @livewire('rtn.data-result-check')
        </div>
    </div>
</div>

@endsection
