

@extends('web.layouts.app')
@section('title')
    Отчет о зафиксированных возможных техногенных событий
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах</h2>
                        @can('role-create')
                            <div class="bat_info"><a href="{{ url('pdf_scena') }}">Создать PDF</a></div>
                        @endcan
                    </div>



                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 25vh">Дата и время события</th>
                        <th style="width: 25vh">Наименование ОПО</th>
                        <th style="width: 25vh">Наименование элемента ОПО</th>
                        <th style="width: 25vh">Наименование типового сценария в соответствии с матрицей</th>
                        <th style="width: 25vh">Класс события</th>
                        <th style="width: 25vh">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows1 as $row)
                        <tr>
                            <td>{{$row->data}}</td>
                            <td>{{$row->jas_to_opo->descOPO}}</td>
                            <td>{{$row->jas_to_elem->nameObj}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->level}}</td>
                            <td>{{$row->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>




@endsection
