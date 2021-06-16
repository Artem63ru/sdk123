

@extends('web.layouts.app')
@section('title')
    Отчет о состоянии ОПО
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о состоянии опасных производственных объектов по состоянию на</h2>

                    </div>
{{--                    @can('role-delete')--}}
{{--                       <a href="{{ url('pdf_opo') }}" class="btn btn-success mb-2">Export PDF</a>--}}
{{--                    @endcan--}}

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
                    <thead>
                    <tr>
                        <th rowspan="2" class="centered">ОПО</th>
                        <th rowspan="2" class="centered">ИП ПБ ОПО</th>
                        <th colspan="2" class="centered">Минимальный интегральный показатель состояния ПБ элемента ОПО</th>
                    </tr>
                    <tr>
                        <th >ИП ПБ элемента ОПО</th>
                        <th class="centered">Наименование элемента</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item['name_opo']}}</td>
                            <td class="centered">{{$item['IP_OPO']}}</td>
                            <td class="centered">{{$item['IP_ELEM']}}</td>
                            <td>{{$item['name_elem']}}</td>


                        </tr>

                    @endforeach

                    <td class="bat_info"><a href="{{ url('pdf_opo') }}">Export PDF</a></td>
                    </tbody>

                </table>


            </div>
        </div>





@endsection
