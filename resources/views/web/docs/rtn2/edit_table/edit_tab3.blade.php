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
                <div style="background: #FFFFFF; height:33rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab3') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                                <div class="form-group">
                                    <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="date_act" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата утверждения положения о системе управления промышленной безопасностью</label>
                                <div class="form-group">
                                    <input id="date_act" style="width: 450px" type="date" class="form-control @error('date_act') is-invalid @enderror" name="date_act" value="{{ $data_table->date_act }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="date_plan_from" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата утверждения плана мероприятий по снижению риска аварий на опасных производственных объектах</label>
                                <div class="form-group">
                                    <input id="date_plan_from" style="width: 450px" type="date" class="form-control @error('date_plan_from') is-invalid @enderror" name="date_plan_from" value="{{ $data_table->date_plan_from }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="period_event" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Период действия плана мероприятий плана мероприятий по снижению риска аварий на опасных производственных объектах (Дата окончания действия)</label>
                                <div class="form-group">
                                    <input id="period_event" style="width: 450px" type="date" class="form-control @error('period_event') is-invalid @enderror" name="period_event" value="{{ $data_table->period_event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="analitic" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Анализ функционирования системы управления промышленной безопасностью за прошедший год (наименование файла c расширением *.PDF/A из приложенного ZIP-архива)</label>
                                <div class="form-group">
                                    <input id="analitic" style="width: 450px" type="text" class="form-control @error('analitic') is-invalid @enderror" name="analitic" value="{{ $data_table->analitic }}" required autocomplete="name" autofocus>
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
