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


                @livewire('rtn.pm')
{{--        </div>--}}

        @livewire('rtn.report-t-u')
{{--        </div>--}}

        @livewire('rtn.report-worker')

        @livewire('rtn.report-worker-cert')

        @livewire('rtn.report-worker-p-k')



        @livewire('rtn.data-check-out')


        @livewire('rtn.data-result-check')
{{--        </div>--}}
    </div>
</div>

@endsection
