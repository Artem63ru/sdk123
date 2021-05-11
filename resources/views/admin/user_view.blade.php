@extends('web.layouts.app_admin')
@section('title')
    Админ панель
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                 @include('admin.inc.menu')
                    <div class="card-header"> Список пользователей</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Администратор</th>
                                <th scope="col">Инженер</th>
                                <th scope="col">Оператор</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row-4">{{ $user->id }}</th>
                                    <td>{{ $user->surname.' '.$user->name.' '.$user->middle_name }} </td>
                                    {{--                                        @if($user->hasPermission('manage-users'))--}}
                                    {{--                                            <td>--}}
                                    {{--                                                <input class="form-check-input" type="checkbox" id="flexCheckCheckedDisabled" checked disabled>--}}
                                    {{--                                            </td>--}}
                                    {{--                                        @else--}}
                                    {{--                                            <td>нет</td>--}}
                                    {{--                                        @endif--}}
{{--                                    @if($user->hasRole('admin'))--}}
{{--                                        <td>--}}
{{--                                            <input class="form-check-input" type="checkbox"--}}
{{--                                                   id="flexCheckCheckedDisabled" checked disabled>--}}
{{--                                        </td>--}}
{{--                                    @else--}}
{{--                                        <td><input class="form-check-input" type="checkbox"--}}
{{--                                                   id="flexCheckCheckedDisabled"  disabled></td>--}}
{{--                                    @endif--}}
{{--                                    @if($user->hasRole('ingener'))--}}
{{--                                        <td>--}}
{{--                                            <input class="form-check-input" type="checkbox"--}}
{{--                                                   id="flexCheckCheckedDisabled" checked disabled>--}}
{{--                                        </td>--}}
{{--                                    @else--}}
{{--                                        <td><input class="form-check-input" type="checkbox"--}}
{{--                                                   id="flexCheckCheckedDisabled"  disabled></td>--}}
{{--                                    @endif--}}
{{--                                    @if($user->hasRole('operator'))--}}
{{--                                        <td>--}}
{{--                                            <input class="form-check-input" type="checkbox"--}}
{{--                                                   id="flexCheckCheckedDisabled" checked disabled>--}}
{{--                                        </td>--}}
{{--                                    @else--}}
{{--                                        <td><input class="form-check-input" type="checkbox"--}}
{{--                                                   id="flexCheckCheckedDisabled"  disabled></td>--}}
{{--                                    @endif--}}

                                    <td><a href = 'delete/{{ $user->id }}' class="btn btn-danger ">Удалить</a></td>
                                    <td><a href = 'edit/{{ $user->id }}' class="btn btn-primary ">Редактировать</a></td>
                                    @if ($user->isBanned())
                                        <td><a href = 'unban/{{ $user->id }}' class="btn btn-secondary ">Разблокировать</a></td>
                                    @endif
                                    @if ($user->isNotBanned())
                                         <td><a href = 'ban/{{ $user->id }}' class="btn btn-warning ">Блок</a></td>
                                    @endif
                                    {{--                                <td>{{ $user->ip }}</td>--}}
                                    {{--                              <td>{{ $user->created_at }}</td>--}}
                                </tr>
                            @endforeach

                            <a href=" {{ route('reg_user')  }}" class="btn btn-primary mb-2">Добавить пользователя</a>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
