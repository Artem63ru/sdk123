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
                            <form method="POST" action="{{ route('update_tab521') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наименование работ</label>
                                <div class="form-group">
                                    <input id="name_job" style="width: 450px" type="text" class="form-control @error('name_job') is-invalid @enderror" name="name_job" value="{{ $data_table->name_job }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Учётный номер технического устройства</label>
                                <div class="form-group">
                                    <input id="num_tu" style="width: 450px" type="text" class="form-control @error('num_tu') is-invalid @enderror" name="num_tu" value="{{ $data_table->num_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Причины приостановления работ/приостановления эксплуатации технического устройства</label>
                                <div class="form-group">
                                    <input id="reason_stop" style="width: 450px" type="text" class="form-control" name="reason_stop" value="{{ $data_table->reason_stop }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Срок приостановления</label>
                                <div class="form-group">
                                    <input id="time_stop" style="width: 450px" type="text" class="form-control" name="time_stop" value="{{ $data_table->time_stop }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Выполненные мероприятия по устранению причин приостановки работ/приостановки эксплуатации ТУ</label>
                                <div class="form-group">
                                    <input id="check_event" style="width: 450px" type="text" class="form-control" name="check_event" value="{{ $data_table->check_event }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата документа о разрешении возобновления работ/эксплуатации ТУ</label>
                                <div class="form-group">
                                    <input id="date_act" style="width: 450px" type="date" class="form-control" name="date_act" value="{{ $data_table->date_act }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Номер документа о разрешении возобновления работ/эксплуатации ТУ</label>
                                <div class="form-group">
                                    <input id="num_act" style="width: 450px" type="text" class="form-control" name="num_act" value="{{ $data_table->num_act }}" autocomplete="name" autofocus>
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
