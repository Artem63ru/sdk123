

@extends('web.layouts.app')
@section('title')
    Отчет о состоянии ОПО
@endsection

@section('content')
    @include('web.include.sidebar_doc')

    <div class="table_header centered">Отчет о состоянии опасных производственных объектов по состоянию на

        <div style="height: 700px" class="inside_tab_padding">
            <div class="row_block plan_new">
                <table>
                    <thead>
                    <tr>
                        <th rowspan="2" class="centered">ОПО</th>
                        <th rowspan="2" class="centered">ИП ПБ ОПО</th>
                        <th colspan="2" class="centered">Минимальный интегральный показатель состояния ПБ элемента ОПО</th>
                    </tr>
                    <tr>
                        <th class="centered">ИП ПБ элемента ОПО</th>
                        <th class="centered">Наименование элемента</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item['name_opo']}}</td>
                            <td>{{$item['IP_OPO']}}</td>
                            <td>{{$item['name_elem']}}</td>
                            <td>{{$item['IP_ELEM']}}</td>

                        </tr>

                    @endforeach


                    </tbody>

                </table>


            </div>
        </div>





@endsection
