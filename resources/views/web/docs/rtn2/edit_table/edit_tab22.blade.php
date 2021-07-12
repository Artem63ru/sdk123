@extends('web.layouts.app')
@section('title')
    Для годового отчета
@endsection
@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush
    @include('web.include.sidebar_doc')


    <div class="top_table">
        @include('web.include.toptable')
    </div>
    <div class="inside_content">
        <div class="inside_tab_padding" style="height: 600px">
            <div class="row_block">
                <style>
                     label {
                        display: block;
                        margin-bottom: 0.5rem;}
                </style>
                <div style="background: #FFFFFF; height:49rem; padding: 35px; border-radius: 6px"
                     class="container">


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
                            <form method="POST" action="{{ route('update_tab22') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                                <div class="card-header">
                                    <div class="form-inline">
                                        <div class="col-4">
                            <label for="time" style="padding-left: 35px">Регистрационный номер ОПО</label>
                                        </div>
                            <div class="col-4">
                                <input id="num_opo" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>
                                        </div>

                                            <div class="form-inline">
                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Фамилия</label>
                                                </div>
                                <div class="col-4">
                                    <input id="name_f" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('name_f') is-invalid @enderror" name="name_f" value="{{ $data_table->name_f }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Имя</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="name_n" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('name_n') is-invalid @enderror" name="name_n" value="{{ $data_table->name_n }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                        </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Отчество</label>
                                                                </div>
                                <div class="col-4">
                                    <input id="name_o" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="name_o" value="{{ $data_table->name_o }}"  autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Должность</label>
                                                                        </div>
                                <div class="col-4">
                                    <input id="post" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ $data_table->post }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                        </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Образование/квалификация</label>
                                                                                </div>
                                <div class="col-4">
                                    <input id="education" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ $data_table->education }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Стаж работы в отрасли</label>
                                                                                        </div>
                                <div class="col-4">
                                    <input id="experiens" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('experiens') is-invalid @enderror" name="experiens" value="{{ $data_table->experiens }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                        </div>

                                                                                            <div class="form-inline">
                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Сведения о последнем повышении квалификации</label>
                                                                                                </div>
                                <div class="col-4">
                                    <input id="last_sert" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="last_sert" value="{{ $data_table->last_sert }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                                </div>

                                <div style="padding-bottom: 40px; margin-top: 20px"
                                     class="text-center">
                                    <button type="submit" class="btn btn-outline-success">Сохранить
                                    </button>
                                    <a href="/docs/rtn2">
                                        <button type="button" class="btn btn-outline-dark">Отменить
                                        </button>
                                    </a>
                                </div>

                </div>
            </div>
        </div>
    </div>


@endsection
