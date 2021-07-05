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
                    <div style="background: #FFFFFF; height:33rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab3/save' }}">
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
                            <label for="date_act" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата утверждения положения о системе управления промышленной безопасностью</label>

                            <div class="col-md-6">
                                <input id="date_act" type="date" style="width: 450px" class="form-control @error('date_act') is-invalid @enderror" name="date_act" value="{{ old('date_act') }}" required autocomplete="date_act" autofocus>

                                @error('date_act')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_plan_from" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата утверждения плана мероприятий по снижению риска аварий на опасных производственных объектах</label>

                            <div class="col-md-6">
                                <input id="date_plan_from" type="date" style="width: 450px" class="form-control @error('date_plan_from') is-invalid @enderror" name="date_plan_from" value="{{ old('date_plan_from') }}" required autocomplete="date_plan_from" autofocus>

                                @error('date_plan_from')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="period_event" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Период действия плана мероприятий плана мероприятий по снижению риска аварий на опасных производственных объектах (Дата окончания действия)</label>

                            <div class="col-md-6">
                                <input id="period_event" type="date" style="width: 450px" class="form-control @error('period_event') is-invalid @enderror" name="period_event" value="{{ old('period_event') }}" required autocomplete="period_event" autofocus>

                                @error('period_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="analitic" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Анализ функционирования системы управления промышленной безопасностью за прошедший год (наименование файла c расширением *.PDF/A из приложенного ZIP-архива)</label>

                            <div class="col-md-6">
                                <input id="analitic" type="text" style="width: 450px" class="form-control @error('analitic') is-invalid @enderror" name="analitic" value="{{ old('analitic') }}" required autocomplete="analitic" autofocus>

                                @error('analitic')
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
