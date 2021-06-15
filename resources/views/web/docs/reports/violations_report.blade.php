

@extends('web.layouts.app')
@section('title')
    Отчет о выяленных нарушениях
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="table_header centered">Отчет о выяленных нарушениях на опасных производственных объектах за период с по

        <div style="height: 700px" class="inside_tab_padding">
            <div class="row_block plan_new">
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
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>




@endsection
