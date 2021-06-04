@extends('web.layouts.app')
@section('title')
    Админ панель Привелегии
@endsection
@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                 @include('admin.inc.menu')
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Список Привелегий</h2></div>

                    <div class="table-responsive">
                        <div style="height: 75vh" class="no_tab_table open">
                            <table   class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($perms as $perm)
                                <tr>
                                    <th scope="row-4">{{ $perm->id }}</th>
                                    <td>{{ $perm->name }}</td>


                                </tr>
                            @endforeach




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
