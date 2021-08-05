

@extends('web.layouts.app')
@section('title')
    Отчет о выяленных нарушениях
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о выяленных нарушениях на опасных производственных объектах<br>
                            Срок устранения в период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_violations_report/'.$start.'/'.$finish) }}">Создать PDF</a></div>
                        @endcan
                    </div>


                    <div style="background: #FFFFFF; border-radius: 6px" class="inside_tab_padding form51">
                        <div  style="" class="row_block form51">

                <table>
                    <thead>
                    <tr>
                        <th>Содержание выявленного нарушения</th>
                        <th>Наименование элемента ОПО</th>
                        <th>Уровень ПК</th>
                        <th>Направление контроля</th>
                        <th>Тяжесть последствий</th>
                        <th>Отметка о повторяемости</th>
                        <th>Мероприятие по устранению нарушения и причин его возникновения</th>
                        <th>Срок устранения</th>
                        <th>Статус нарушения</th>
                        <th>Ответственный исполнитель</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows3 as $row)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
{{--                            <td>{{$row->id}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>




@endsection
