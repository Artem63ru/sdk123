@extends('web.layouts.app')
@section('title')
    Админ панель Привелегии
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                 @include('admin.inc.menu')
                    <div class="card-header"> Список Привелегий</div>

                    <div class="card-body">
                        <table class="table table-hover">
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
@endsection
