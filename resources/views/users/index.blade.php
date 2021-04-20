@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('admin.inc.menu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список пользователей</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> + Создать</a>
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
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
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
                    <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                @if ($user->isBanned())
                    <a href = 'admin/unban/{{ $user->id }}' class="btn btn-secondary btn-sm ">UnBlock</a>
                @endif
                @if ($user->isNotBanned())
                        <a href = 'admin/ban/{{ $user->id }}' class="btn btn-warning  btn-sm">Block</a>
                    @endif
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
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
