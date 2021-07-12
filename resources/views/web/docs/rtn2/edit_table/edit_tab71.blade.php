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
                            <form method="POST" action="{{ route('update_tab71') }}">
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
                                <label for="time" style="padding-left: 35px">Вид происшествия</label>
                                                </div>
                                <div class="col-4">
                                    <input id="type_accident" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('type_accident') is-invalid @enderror" name="type_accident" value="{{ $data_table->type_accident }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Содержание инцидента</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="desc_accident" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('desc_accident') is-invalid @enderror" name="desc_accident" value="{{ $data_table->desc_accident }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Место инцидента</label>
                                                                </div>
                                <div class="col-4">
                                    <input id="place" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $data_table->place }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата</label>
                                                                        </div>
                                <div class="col-4">
                                    <input id="date_accident" style="width: 450px; margin-top: 7px" type="date" class="form-control @error('date_accident') is-invalid @enderror" name="date_accident" value="{{ $data_table->date_accident }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Ответсвенный за инцидент</label>
                                                                                </div>
                                <div class="col-4">
                                    <input id="respons_worker" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('respons_worker') is-invalid @enderror" name="respons_worker" value="{{ $data_table->respons_worker }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Отметка о выполнении мероприятий, предложенных комиссией по расследованию несчастных случаев</label>
                                                                                        </div>
                                                                                            <div class="col-4">
                                    <input id="check_event" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('check_event') is-invalid @enderror" name="check_event" value="{{ $data_table->check_event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                            <div class="form-inline">
                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Реализация мероприятий, предложенных комиссией, по результатам расследования причин комиссией по расследованию несчастных случаев</label>
                                                                                                </div>
                                                                                                    <div class="col-4">
                                    <input id="event" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('event') is-invalid @enderror" name="event" value="{{ $data_table->event }}" required autocomplete="name" autofocus>
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
