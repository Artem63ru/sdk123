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

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Вид происшествия</label>
                                <div class="form-group">
                                    <input id="type_accident" style="width: 450px" type="text" class="form-control @error('type_accident') is-invalid @enderror" name="type_accident" value="{{ $data_table->type_accident }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Содержание инцидента</label>
                                <div class="form-group">
                                    <input id="desc_accident" style="width: 450px" type="text" class="form-control @error('desc_accident') is-invalid @enderror" name="desc_accident" value="{{ $data_table->desc_accident }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Место инцидента</label>
                                <div class="form-group">
                                    <input id="place" style="width: 450px" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $data_table->place }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата</label>
                                <div class="form-group">
                                    <input id="date_accident" style="width: 450px" type="date" class="form-control @error('date_accident') is-invalid @enderror" name="date_accident" value="{{ $data_table->date_accident }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Ответсвенный за инцидент</label>
                                <div class="form-group">
                                    <input id="respons_worker" style="width: 450px" type="text" class="form-control @error('respons_worker') is-invalid @enderror" name="respons_worker" value="{{ $data_table->respons_worker }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Отметка о выполнении мероприятий, предложенных комиссией по расследованию несчастных случаев</label>
                                <div class="form-group">
                                    <input id="check_event" style="width: 450px" type="text" class="form-control @error('check_event') is-invalid @enderror" name="check_event" value="{{ $data_table->check_event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Реализация мероприятий, предложенных комиссией, по результатам расследования причин комиссией по расследованию несчастных случаев</label>
                                <div class="form-group">
                                    <input id="event" style="width: 450px" type="text" class="form-control @error('event') is-invalid @enderror" name="event" value="{{ $data_table->event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>



                                <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" style="margin-left: 46%; margin-top: 30px" class="bat_add">Сохранить</button>
                        </div>

                    </form>
                            </div>
                        </div>
                    </div>
                </div>


    @include('web.include.modal.datapicker')


@endsection
