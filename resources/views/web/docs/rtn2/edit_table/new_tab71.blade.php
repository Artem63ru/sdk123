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
                    <div style="background: #FFFFFF; height:40rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab71/save' }}">
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
                            <label for="type_accident" style="padding-left: 35px">Вид происшествия</label>
                                </div>
                            <div class="col-4">
                                <input id="type_accident" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('type_accident') is-invalid @enderror" name="type_accident" value="{{ old('type_accident') }}" required autocomplete="type_accident" autofocus>

                                @error('type_accident')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="desc_accident" style="padding-left: 35px">Содержание инцидента</label>
                                </div>
                            <div class="col-4">
                                <input id="desc_accident" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('desc_accident') is-invalid @enderror" name="desc_accident" value="{{ old('desc_accident') }}" required autocomplete="desc_accident" autofocus>

                                @error('desc_accident')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="place" style="padding-left: 35px">Место инцидента</label>
                                </div>
                            <div class="col-4">
                                <input id="place" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" required autocomplete="place" autofocus>

                                @error('place')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="date_accident" style="padding-left: 35px">Дата</label>
                                </div>
                            <div class="col-4">
                                <input id="date_accident" type="date" style="width: 450px; margin-top: 7px" class="form-control @error('date_accident') is-invalid @enderror" name="date_accident" value="{{ old('date_accident') }}" required autocomplete="date_accident" autofocus>

                                @error('date_accident')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="respons_worker" style="padding-left: 35px">Ответсвенный за инцидент</label>
                                </div>
                            <div class="col-4">
                                <input id="respons_worker" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('respons_worker') is-invalid @enderror" name="respons_worker" value="{{ old('respons_worker') }}" required autocomplete="respons_worker" autofocus>

                                @error('respons_worker')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="check_event" style="padding-left: 35px">Отметка о выполнении мероприятий, предложенных комиссией по расследованию несчастных случаев</label>
                                </div>
                            <div class="col-4">
                                <input id="check_event" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('check_event') is-invalid @enderror" name="check_event" value="{{ old('check_event') }}" required autocomplete="check_event" autofocus>

                                @error('check_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="event" style="padding-left: 35px">Реализация мероприятий, предложенных комиссией, по результатам расследования причин комиссией по расследованию несчастных случаев</label>
                                </div>
                            <div class="col-4">
                                <input id="event" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('event') is-invalid @enderror" name="event" value="{{ old('event') }}" required autocomplete="event" autofocus>

                                @error('event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
