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
            <div class="inside_tab_padding">
                <div class="row_block">
                    <div style="background: #FFFFFF; height:41rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab521/save' }}">
                        @csrf
                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание новой записи</h2></div>

                        <div class="card-header">
                        <div class="form-inline">
                                <div class="col-4">
                            <label for="num_opo" style="padding-left: 35px">Регистрационный номер ОПО</label>
                                </div>
                            <div class="col-4">
                                <input id="num_opo" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ old('num_opo') }}" required autocomplete="num_opo" autofocus>

                                @error('num_opo')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="name_job" style="padding-left: 35px">Наименование работ</label>
                                </div>
                            <div class="col-4">
                                <input id="name_job" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name_job') is-invalid @enderror" name="name_job" value="{{ old('name_job') }}" required autocomplete="name_job" autofocus>

                                @error('name_job')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="num_tu" style="padding-left: 35px">Учётный номер технического устройства</label>
                                </div>
                            <div class="col-4">
                                <input id="num_tu" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('num_tu') is-invalid @enderror" name="num_tu" value="{{ old('num_tu') }}" required autocomplete="num_tu" autofocus>

                                @error('num_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="reason_stop" style="padding-left: 35px">Причины приостановления работ/приостановления эксплуатации технического устройства</label>
                                </div>
                            <div class="col-4">
                                <input id="reason_stop" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="reason_stop" value="{{ old('reason_stop') }}" autocomplete="reason_stop" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="time_stop" style="padding-left: 35px">Срок приостановления</label>
                                </div>
                            <div class="col-4">
                                <input id="time_stop" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="time_stop" value="{{ old('time_stop') }}" autocomplete="time_stop" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="check_event" style="padding-left: 35px">Выполненные мероприятия по устранению причин приостановки работ/приостановки эксплуатации ТУ</label>
                                </div>
                            <div class="col-4">
                                <input id="check_event" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="check_event" value="{{ old('check_event') }}"  autocomplete="check_event" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="date_act" style="padding-left: 35px">Дата документа о разрешении возобновления работ/эксплуатации ТУ</label>
                                </div>
                            <div class="col-4">
                                <input id="date_act" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="date_act" value="{{ old('date_act') }}" autocomplete="date_act" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="num_act" style="padding-left: 35px">Номер документа о разрешении возобновления работ/эксплуатации ТУ</label>
                                </div>
                            <div class="col-4">
                                <input id="num_act" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="num_act" value="{{ old('num_act') }}" autocomplete="num_act" autofocus>

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
                    </form>
                    </div>
                </div>
            </div>
    </div>

@endsection
