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
                <div style="background: #FFFFFF; height:47rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab81') }}">
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
                                    <input id="fam" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('fam') is-invalid @enderror" name="fam" value="{{ $data_table->fam }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Имя</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="name" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data_table->name }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Отчество</label>
                                                                </div>
                                <div class="col-4">
                                    <input id="otch" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="otch" value="{{ $data_table->otch }}" autocomplete="name" autofocus>
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
                                <label for="time" style="padding-left: 35px">Стаж работы в области промышленной безопасности</label>
                                                                                </div>
                                <div class="col-4">
                                    <input id="experiens" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('experiens') is-invalid @enderror" name="experiens" value="{{ $data_table->experiens }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Наличие резервов финансовых средств и материальных ресурсов для локализации и ликвидации последствий аварий</label>
                                                                                        </div>
                                                                                            <div class="col-4">
                                    <input id="check_resurs" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('check_resurs') is-invalid @enderror" name="check_resurs" value="{{ $data_table->check_resurs }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                            <div class="form-inline">
                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Наличие систем наблюдения, оповещения, связи и поддержки действий в случае аварии</label>
                                                                                                </div>
                                                                                                    <div class="col-4">
                                    <input id="check_system_monitoring" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('check_system_monitoring') is-invalid @enderror" name="check_system_monitoring" value="{{ $data_table->check_system_monitoring }}" required autocomplete="name" autofocus>
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
                            </form>
                </div>
            </div>
        </div>
    </div>


@endsection
