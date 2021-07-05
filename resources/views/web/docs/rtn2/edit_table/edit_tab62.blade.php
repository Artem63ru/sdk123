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
                            <form method="POST" action="{{ route('update_tab62') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наименование здания/сооружения, входящего в состав ОПО</label>
                                <div class="form-group">
                                    <input id="name" style="width: 450px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data_table->name }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Год ввода в эксплуатацию здания, эксплуатируемого на ОПО</label>
                                <div class="form-group">
                                    <input id="year_exp" style="width: 450px" type="text" class="form-control @error('year_exp') is-invalid @enderror" name="year_exp" value="{{ $data_table->year_exp }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата окончания реконструкции здания (при наличии)</label>
                                <div class="form-group">
                                    <input id="date_reconstruction" style="width: 450px" type="date" class="form-control" name="date_reconstruction" value="{{ $data_table->date_reconstruction }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата окончания капитального ремонта (при наличии)</label>
                                <div class="form-group">
                                    <input id="date_repair" style="width: 800px" type="date" class="form-control" name="date_repair" value="{{ $data_table->date_repair }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата следующей экспертизы промышленной безопасности (при наличии)</label>
                                <div class="form-group">
                                    <input id="date_next_check" style="width: 800px" type="date" class="form-control" name="date_next_check" value="{{ $data_table->date_next_check }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата проведения экспертизы промышленной безопасности (при наличии)</label>
                                <div class="form-group">
                                    <input id="date_check" style="width: 450px" type="data" class="form-control" name="date_check" value="{{ $data_table->date_check }}"  autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Вывод о соответствии объекта требованиям промышленной безопасности</label>
                                <div class="form-group">
                                    <input id="result_check" style="width: 450px" type="text" class="form-control @error('result_check') is-invalid @enderror" name="result_check" value="{{ $data_table->result_check }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Если выбрано "Не в полной мере соответствует", то указать процент выполненных мероприятий из назначенных</label>
                                <div class="form-group">
                                    <input id="percent_event" style="width: 450px" type="text" class="form-control" name="percent_event" value="{{ $data_table->percent_event }}"  autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл</label>
                                <div class="form-group">
                                    <input id="file" style="width: 450px" type="text" class="form-control" name="file" value="{{ $data_table->file }}" autocomplete="name" autofocus>
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
