

@extends('web.layouts.app')
@section('title')
    Справка о выполнении актов
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Справка о выполнении актов, предписаний, выданных органами надзора и контроля в области ПБ</h2>
                        @can('role-create')
                            <div class="bat_info"><a href="{{ url('pdf_act_pb') }}">Создать PDF</a></div>
                        @endcan
                    </div>

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
                    <thead>
                    <tr>
                        <th rowspan="2" class="centered">№ П/П</th>
                        <th rowspan="2" class="centered">Структура ПБ, выдавшая акт, акт-предписание</th>
                        <th rowspan="2" class="centered">№ акта, акта-предписания, дата</th>
                        <th colspan="4" class="centered">Количество пунктов нарушений</th>
                        <th rowspan="2" class="centered">Примечание</th>
                    </tr>
                    <tr>
                        <th class="centered">Всего</th>
                        <th class="centered">Устранено</th>
                        <th class="centered">Срок исполнения не истек</th>
                        <th class="centered">С истекшим сроком исполнения</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows as $item)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    @endforeach


                    </tbody>

                </table>


            </div>
        </div>





@endsection
