@extends('web.layouts.app')
@section('title')
    Административная панель
@endsection

@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                        @include('web.admin.inc.menu')
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Журнал событий</h2></div>

                    <div class="table-responsive">
                        <div style="height: 75vh" class="no_tab_table open">
                            <table   class="table table-hover table-bordered">
{{--                                <table style="font-size: 18px">--}}
                                    <thead class="table-light">
                                    <tr>
                                        <th  scope="col">#</th>
                                        <th  scope="col-3">Описание события</th>
                                        <th class="centered">Пользователь</th>
                                        <th rowspan="3" class="centered">IP адрес</th>
                                        <th rowspan="3" class="centered">Дата</th>
                                    </tr>
                                    </thead>

                            <tbody>

                            @foreach ($logs as $log)
                                <tr>
                                    <td class="centered">{{ $log->id }}</td>
                                    <td style="width: 60%" class="col-3">{{ $log->description }}</td>
                                    <td style="width: 10%"class="centered col-1">{{ $log->username }}</td>
                                    <td style="width: 10%" class="centered">{{ $log->ip }}</td>
                                    <td class="centered">{{ $log->created_at }}</td>
                                </tr>
                            @endforeach


                            </tbody>
                                </div>
                        </table>

                        <div class="table_use">
                            <table   class="table table-hover ">
                                <tbody>
                                <tr>
                                    <td> <p style="font-size: 18px">Всего записей:{{$logs->count()}}</p>    </td>
                                    <td>  {{ $logs->links() }}</td>
                                    @can('role-delete')
                                    <td>   <a href="{{ url('pdf_logs') }}" class="btn btn-success mb-2">Export PDF</a></td>
                                    @endcan
                                </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>


                </div>
{{--            </div>--}}

        </div>

{{--    </div>--}}
{{--    </div>--}}


    </div>







@endsection
