@extends('web.layouts.app')


@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('admin.inc.menu')
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Редактирование данных пользователя : {{ $user->name }}</h2>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Назад</a>
            </div>
        </div>



    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    <div class="row px-xl-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                <strong class="text-muted h3">Фамилия Имя Отчество:</strong>
                </div>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Email:</strong>
                </div>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Пароль:</strong>
                </div>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Подтверждение пароля:</strong>
                </div>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Роли пользователя:</strong>
                </div>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
                        <div style="padding-bottom: 40px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
    </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
@endsection
