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
                    <div style="background: #FFFFFF; height:33rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab3/save' }}">
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
                            <label for="date_act" style="padding-left: 35px">Дата утверждения положения о системе управления промышленной безопасностью</label>
                                </div>
                                <div class="col-4">
                                <input id="date_act" type="date" style="width: 450px; margin-top: 7px" class="form-control @error('date_act') is-invalid @enderror" name="date_act" value="{{ old('date_act') }}" required autocomplete="date_act" autofocus>

                                @error('date_act')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="date_plan_from" style="padding-left: 35px">Дата утверждения плана мероприятий по снижению риска аварий на опасных производственных объектах</label>
                                </div>
                                <div class="col-4">
                                <input id="date_plan_from" type="date" style="width: 450px; margin-top: 7px" class="form-control @error('date_plan_from') is-invalid @enderror" name="date_plan_from" value="{{ old('date_plan_from') }}" required autocomplete="date_plan_from" autofocus>

                                @error('date_plan_from')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="period_event" style="padding-left: 35px">Период действия плана мероприятий плана мероприятий по снижению риска аварий на опасных производственных объектах (Дата окончания действия)</label>
                                </div>
                                <div class="col-4">
                                <input id="period_event" type="date" style="width: 450px; margin-top: 7px" class="form-control @error('period_event') is-invalid @enderror" name="period_event" value="{{ old('period_event') }}" required autocomplete="period_event" autofocus>

                                @error('period_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                            <div class="form-inline">
                                <div class="col-4">
                            <label for="analitic" style="padding-left: 35px">Анализ функционирования системы управления промышленной безопасностью за прошедший год (наименование файла c расширением *.PDF/A из приложенного ZIP-архива)</label>
                                </div>
                                <div class="col-4">
                                <input id="analitic" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('analitic') is-invalid @enderror" name="analitic" value="{{ old('analitic') }}" required autocomplete="analitic" autofocus>

                                @error('analitic')
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
