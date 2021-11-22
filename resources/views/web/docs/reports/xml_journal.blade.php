

@extends('web.layouts.app')
@section('title')
    Отчет о состоянии элементов
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Журнал отправки XML<br>
                            В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <table>
                                <td><div class="bat_info"><a href="{{ url('pdf_xml_journal/'.$start.'/'.$finish) }}">Создать PDF</a></div></td>
                                <td><div class="bat_info"><a href="{{ route('xml_journal_delete') }}">Очистить журнал</a></div></td>
                            </table>
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
                        <th style="width: 25vh">№</th>
                        <th style="width: 25vh">Наименование ОПО</th>
                        <th style="width: 25vh">Регистрационный номер ОПО</th>
                        <th style="width: 25vh">Интегральный показатель ОПО</th>
                        <th style="width: 25vh">Статус</th>
                        <th style="width: 25vh">Дата отправки</th>
                        <th style="width: 25vh">Время отправки</th>
                        <th style="width: 25vh">Иденттификатор отправки</th>
                    </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<count($data['fullDescOPO']); $i++)
                            <tr>
                                <td>{{$i + 1}}</td>
                                <td>{{$data['fullDescOPO'][$i]}}</td>
                                <td>{{$data['regNumOPO'][$i]}}</td>
                                <td>{{$data['ip_opo'][$i]}}</td>
                                <td>{{$data['status'][$i]}}</td>
                                <td>{{$data['date'][$i]}}</td>
                                <td>{{$data['time'][$i]}}</td>
                                <td>{{$data['guid'][$i]}}</td>
                            </tr>
                        @endfor

                    </tbody>

                </table>

            </div>

        </div>




@endsection
