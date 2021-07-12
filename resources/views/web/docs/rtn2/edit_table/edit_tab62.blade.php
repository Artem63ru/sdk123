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
                            <form method="POST" action="{{ route('update_tab62') }}">
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
                                <label for="time" style="padding-left: 35px">Наименование здания/сооружения, входящего в состав ОПО</label>
                                                </div>
                                <div class="col-4">
                                    <input id="name" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data_table->name }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                </div>
                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Год ввода в эксплуатацию здания, эксплуатируемого на ОПО</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="year_exp" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('year_exp') is-invalid @enderror" name="year_exp" value="{{ $data_table->year_exp }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                        </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата окончания реконструкции здания (при наличии)</label>
                                                                </div>
                                <div class="col-4">
                                    <input id="date_reconstruction" style="width: 450px; margin-top: 7px" type="date" class="form-control" name="date_reconstruction" value="{{ $data_table->date_reconstruction }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата окончания капитального ремонта (при наличии)</label>
                                                                        </div>
                                <div class="col-4">
                                    <input id="date_repair" style="width: 450px; margin-top: 7px" type="date" class="form-control" name="date_repair" value="{{ $data_table->date_repair }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                        </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата следующей экспертизы промышленной безопасности (при наличии)</label>
                                                                                </div>
                                <div class="col-4">
                                    <input id="date_next_check" style="width: 450px; margin-top: 7px" type="date" class="form-control" name="date_next_check" value="{{ $data_table->date_next_check }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата проведения экспертизы промышленной безопасности (при наличии)</label>
                                                                                        </div>
                                <div class="col-4">
                                    <input id="date_check" style="width: 450px; margin-top: 7px" type="data" class="form-control" name="date_check" value="{{ $data_table->date_check }}"  autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                        </div>

                                                                                            <div class="form-inline">
                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Вывод о соответствии объекта требованиям промышленной безопасности</label>
                                                                                                </div>
                                <div class="col-4">
                                    <input id="result_check" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('result_check') is-invalid @enderror" name="result_check" value="{{ $data_table->result_check }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                                </div>

                                                                                                    <div class="form-inline">
                                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Если выбрано "Не в полной мере соответствует", то указать процент выполненных мероприятий из назначенных</label>
                                                                                                        </div>
                                <div class="col-4">
                                    <input id="percent_event" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="percent_event" value="{{ $data_table->percent_event }}"  autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                                                    </div>

                                                                                                            <div class="form-inline">
                                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Файл</label>
                                                                                                                </div>
                                <div class="col-4">
                                    <input id="file" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="file" value="{{ $data_table->file }}" autocomplete="name" autofocus>
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
