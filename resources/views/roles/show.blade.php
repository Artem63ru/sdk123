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
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Просмотр роли :   {{ $role->name }}</h2>

                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Назад</a>
                            </div>
                    </div>

                    <div class="table-responsive">
                        <div style="height: 75vh" class="no_tab_table open">
                            <table   class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Привелегии</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($rolePermissions))
                                  @foreach ($rolePermissions as $v)
                                    <tr>
                                        <th scope="row-4">{{ $v->id }}</th>
                                        <td>{{ $v->name }}</td>


                                    </tr>
                                  @endforeach
                                @endif



                                </tbody>
                            </table>
                        </div>
                    </div>

    </div>
                </div>
            </div>

@endsection
