@extends('layouts.app')
@section('title')
    Админ панель
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('admin.inc.menu')
                    <div class="card-header"><h2>Журнал событий</h2></div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Описание события</th>
                                <th scope="col">Пользователь</th>
                                <th scope="col">IP адрес</th>
                                <th scope="col">Дата</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($logs as $log)
                                    <tr>
                                <th scope="row-4">{{ $log->id }}</th>
                                <td>{{ $log->description }}</td>
                                 <td>{{ $log->username }}</td>
                                 <td>{{ $log->ip }}</td>
                                 <td>{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                        {{ $logs->links() }}
                        <a href="{{ url('pdf_logs') }}" class="btn btn-success mb-2">Export PDF</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
