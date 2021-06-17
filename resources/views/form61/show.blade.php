@extends('web.layouts.app_admin')


@section('content')
{{--    @push('app-css')--}}
{{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    @endpush--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('admin.inc.menu')
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Просмотр данных пользователя :{{ $user->name }}</h2>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('users.index') }}"> Назад</a>
                            </div>
                        </div>
                    </div>


{{--      <div class="row px-xl-5">--}}
          <div class="table-responsive">
              <div style="height: 75vh" class="no_tab_table open">
          <table   class="table table-hover table-bordered">
              <tbody>
              <tr>
        <td><div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Фамилия Имя Отчество:      {{ $user->name }}</strong>
                </div>

            </div>
        </div>
        </td>
              </tr>
                <tr>
                    <td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Email:   {{ $user->email }}</strong>
                </div>

            </div>
        </div>
              </td>
              </tr>
                <tr>
                    <td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="padding: 15px" class="">
                    <strong class="text-muted h3">Роли пользователя:</strong>

                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
              </td>
              </tr>
              </tbody>
          </table>
    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
@endsection
