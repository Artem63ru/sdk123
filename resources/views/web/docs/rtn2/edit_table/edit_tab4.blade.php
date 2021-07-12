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
                <div style="background: #FFFFFF; height:60rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab4') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                                <div class="card-header">
                                    <div class="form-inline">
                                        <div class="col-4">
                            <label for="time" style="padding-left: 35px">Регистрационный номер ОПО</label>
                                        </div>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>
                                        </div>

                                            <div class="form-inline">
                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Наименование мероприятия</label>
                                                </div>
                                <div class="form-group">
                                    <input id="name_event" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('name_event') is-invalid @enderror" name="name_event" value="{{ $data_table->name_event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                            </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата выполнения</label>
                                                        </div>
                                <div class="form-group">
                                    <input id="date_accept" style="width: 450px; margin-top: 7px" type="date" class="form-control" name="date_accept" value="{{ $data_table->date_accept }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                    </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Отметка о выполнении</label>
                                                                </div>
                                <div class="form-group">
                                    <input id="check_event" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="check_event" value="{{ $data_table->check_event }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                            </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Файл с указанием ссылок на оформленные документы</label>
                                                                        </div>
                                <div class="form-group">
                                    <input id="file" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="file" value="{{ $data_table->file }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                        </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Причины невыполнения</label>
                                                                                </div>
                                <div class="form-group">
                                    <input id="reason_nonpref" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="reason_nonpref" value="{{ $data_table->reason_nonpref }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Реквизиты (дата) заключения экспертизы промышленной безопасности обоснования безопасности опасного производственного объекта</label>
                                                                                        </div>
                                                                                            <div class="form-group">
                                    <input id="recvisits_1" style="width: 450px; margin-top: 7px" type="data" class="form-control" name="recvisits_1" value="{{ $data_table->recvisits_1 }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                        </div>

                                                                                            <div class="form-inline">
                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Реквизиты (рег номер) заключения экспертизы промышленной безопасности обоснования безопасности опасного производственного объекта</label>
                                                                                                </div>
                                                                                                    <div class="form-group">
                                    <input id="recvisits_2" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="recvisits_2" value="{{ $data_table->recvisits_2 }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                                </div>

                                                                                                    <div class="form-inline">
                                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Информация о выполнении/невыполнении требований обоснования безопасности</label>
                                                                                                        </div>
                                <div class="form-group">
                                    <input id="check_require" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('check_require') is-invalid @enderror" name="check_require" value="{{ $data_table->check_require }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                                        </div>

                                                                                                            <div class="form-inline">
                                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Ссылки на офиициальные документы</label>
                                                                                                                </div>
                                <div class="form-group">
                                    <input id="doc" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="doc" value="{{ $data_table->doc }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                                                </div>

                                                                                                                    <div class="form-inline">
                                                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Причины невыполнения требований обоснования безопасности</label>
                                                                                                                        </div>
                                <div class="form-group">
                                    <input id="reason_nonpref_require" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="reason_nonpref_require" value="{{ $data_table->reason_nonpref_require }}" autocomplete="name" autofocus>
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
