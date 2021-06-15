@extends('web.layouts.app_admin')


@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('admin.inc.menu')


                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Список пользователей СДК ПБ</h2>
                        @can('role-create')
                <a class="btn btn-success" href="{{ route('users.create') }}"> + Создать</a>
                        @endcan
                    </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


            <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ФИО</th>
            <th>Email</th>
            <th>Роли</th>
            <th width="380px">Операции</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Просмотр</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Редактирование</a>
                @if ($user->isBanned())
                    <a href = 'admin/unban/{{ $user->id }}' class="btn btn-secondary btn-sm ">Разблокировать</a>
                @endif
                @if ($user->isNotBanned())
                        <a href = 'admin/ban/{{ $user->id }}' class="btn btn-warning  btn-sm">Заблокировать</a>
                    @endif
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $data->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
