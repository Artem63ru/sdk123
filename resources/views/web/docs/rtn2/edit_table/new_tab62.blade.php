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
                    <div style="background: #FFFFFF; height:50rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab62/save' }}">
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
                            <label for="name" style="padding-left: 35px">Наименование здания/сооружения, входящего в состав ОПО</label>
                                </div>
                            <div class="col-4">
                                <input id="name" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="year_exp" style="padding-left: 35px">Год ввода в эксплуатацию здания, эксплуатируемого на ОПО</label>
                                </div>
                            <div class="col-4">
                                <input id="year_exp" type="date" style="width: 450px; margin-top: 7px" class="form-control @error('year_exp') is-invalid @enderror" name="year_exp" value="{{ old('year_exp') }}" required autocomplete="year_exp" autofocus>

                                @error('year_exp')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="date_reconstruction" style="padding-left: 35px">Дата окончания реконструкции здания (при наличии)</label>
                                </div>
                            <div class="col-4">
                                <input id="date_reconstruction" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="date_reconstruction" value="{{ old('date_reconstruction') }}" autocomplete="date_reconstruction" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="date_repair" style="padding-left: 35px">Дата окончания капитального ремонта (при наличии)</label>
                                </div>
                            <div class="col-4">
                                <input id="date_repair" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="date_repair" value="{{ old('date_repair') }}" autocomplete="date_repair" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="date_next_check" style="padding-left: 35px">Дата следующей экспертизы промышленной безопасности (при наличии)</label>
                                </div>
                            <div class="col-4">
                                <input id="date_next_check" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="date_next_check" value="{{ old('date_next_check') }}" autocomplete="date_next_check" autofocus>
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="date_check" style="padding-left: 35px">Дата проведения экспертизы промышленной безопасности (при наличии)</label>
                                </div>
                            <div class="col-4">
                                <input id="date_check" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="date_check" value="{{ old('date_check') }}" autocomplete="date_check" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="result_check" style="padding-left: 35px">Вывод о соответствии объекта требованиям промышленной безопасности</label>
                                </div>
                            <div class="col-4">
                                <input id="result_check" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('result_check') is-invalid @enderror" name="result_check" value="{{ old('result_check') }}" required autocomplete="result_check" autofocus>

                                @error('result_check')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="percent_event" style="padding-left: 35px">Если выбрано "Не в полной мере соответствует", то указать процент выполненных мероприятий из назначенных</label>
                                </div>
                            <div class="col-4">
                                <input id="percent_event" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="percent_event" value="{{ old('percent_event') }}" autocomplete="percent_event" autofocus>

                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="file" style="padding-left: 35px">Файл</label>
                                </div>
                            <div class="col-4">
                                <input id="file" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="file" value="{{ old('file') }}" autocomplete="file" autofocus>

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
