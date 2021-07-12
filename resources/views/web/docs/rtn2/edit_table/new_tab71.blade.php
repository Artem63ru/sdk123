@extends('web.layouts.app')
@section('title')
    Для годового отчета
@endsection
@section('content')
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

                        <div class="form-group row">
                            <label for="num_opo" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>

                            <div class="col-md-6">
                                <input id="num_opo" type="text" style="width: 450px" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ old('num_opo') }}" required autocomplete="num_opo" autofocus>

                                @error('num_opo')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type_accident" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Вид происшествия</label>

                            <div class="col-md-6">
                                <input id="type_accident" type="text" style="width: 450px" class="form-control @error('type_accident') is-invalid @enderror" name="type_accident" value="{{ old('type_accident') }}" required autocomplete="type_accident" autofocus>

                                @error('type_accident')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc_accident" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Содержание инцидента</label>

                            <div class="col-md-6">
                                <input id="desc_accident" type="text" style="width: 450px" class="form-control @error('desc_accident') is-invalid @enderror" name="desc_accident" value="{{ old('desc_accident') }}" required autocomplete="desc_accident" autofocus>

                                @error('desc_accident')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Место инцидента</label>

                            <div class="col-md-6">
                                <input id="place" type="text" style="width: 450px" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" required autocomplete="place" autofocus>

                                @error('place')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_accident" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата</label>

                            <div class="col-md-6">
                                <input id="date_accident" type="date" style="width: 450px" class="form-control @error('date_accident') is-invalid @enderror" name="date_accident" value="{{ old('date_accident') }}" required autocomplete="date_accident" autofocus>

                                @error('date_accident')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="respons_worker" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Ответсвенный за инцидент</label>

                            <div class="col-md-6">
                                <input id="respons_worker" type="text" style="width: 450px" class="form-control @error('respons_worker') is-invalid @enderror" name="respons_worker" value="{{ old('respons_worker') }}" required autocomplete="respons_worker" autofocus>

                                @error('respons_worker')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_event" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Отметка о выполнении мероприятий, предложенных комиссией по расследованию несчастных случаев</label>

                            <div class="col-md-6">
                                <input id="check_event" type="text" style="width: 450px" class="form-control @error('check_event') is-invalid @enderror" name="check_event" value="{{ old('check_event') }}" required autocomplete="check_event" autofocus>

                                @error('check_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Реализация мероприятий, предложенных комиссией, по результатам расследования причин комиссией по расследованию несчастных случаев</label>

                            <div class="col-md-6">
                                <input id="event" type="text" style="width: 450px" class="form-control @error('event') is-invalid @enderror" name="event" value="{{ old('event') }}" required autocomplete="event" autofocus>

                                @error('event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-6 offset-md-4">
                            <button style="margin-left: 45%; margin-top: 30px" type="submit"  class="bat_add">Сохранить запись</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </div>

@endsection
