@extends('web.layouts.app')
@section('title')
    Административная панель
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                        @include('web.admin.inc.menu')
                    <div class="card-header"><h2>Журнал событий</h2></div>

                    <div class="table_head_block">
                        <table class="plan_table norm_tabl">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th >Описание события</th>
                                <th>Пользователь</th>
                                <th >IP адрес</th>
                                <th >Дата</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="top_table_inside full_table">
                        <div class="tabs razd_col_tab no_border">
                            <div class="no_tab_table opend">
                                <table class="plan_table norm_tabl">
                            <tbody>

                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td>{{ $log->username }}</td>
                                    <td>{{ $log->ip }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                                <div class="table_use">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td><p>Всего записей:{{$logs->count()}}</p></td>

                                        </tr>
                                        </tbody>
                                        {!! $logs->links() !!}
                                        <a href="{{ url('pdf_logs') }}" class="btn btn-success mb-2">Export PDF</a>
                                    </table>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
