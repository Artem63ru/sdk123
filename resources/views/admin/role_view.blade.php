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
                    <div class="card-header"> Список Ролей</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row-4">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td><a href = 'delete_roles/{{ $role->id }}' class="btn btn-danger ">Удалить</a></td>
                                    <td><a href = 'edit_roles/{{ $role->id }}' class="btn btn-primary ">Редактировать</a></td>
                                </tr>
                            @endforeach


                            <a href=" {{ route('reg_role')  }}" class="btn btn-primary mb-2">Добавить роль</a>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
