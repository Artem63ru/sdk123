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
    @include('web.docs.rtn2.iclude.doc_header')
    <div class="tabs razd_col_tab">

        @include('web.docs.rtn2.iclude.tab_11')

        @include('web.docs.rtn2.iclude.tab_21')

        @include('web.docs.rtn2.iclude.tab_22')

        @include('web.docs.rtn2.iclude.tab_23')

        @include('web.docs.rtn2.iclude.tab_3')

        @include('web.docs.rtn2.iclude.tab_4')

        @include('web.docs.rtn2.iclude.tab_51')

        @include('web.docs.rtn2.iclude.tab_521')

        @include('web.docs.rtn2.iclude.tab_53')

        @include('web.docs.rtn2.iclude.tab_61')

        @include('web.docs.rtn2.iclude.tab_62')

        @include('web.docs.rtn2.iclude.tab_63')

        @include('web.docs.rtn2.iclude.tab_64')

        @include('web.docs.rtn2.iclude.tab_71')

        @include('web.docs.rtn2.iclude.tab_72')

        @include('web.docs.rtn2.iclude.tab_81')

        @include('web.docs.rtn2.iclude.tab_82')

        @include('web.docs.rtn2.iclude.tab_83')

        @include('web.docs.rtn2.iclude.tab_84')

        @include('web.docs.rtn2.iclude.tab_91')

        @include('web.docs.rtn2.iclude.tab_10')






    </div>
</div>



@endsection
