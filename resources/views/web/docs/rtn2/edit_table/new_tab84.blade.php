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
                    <form method="POST" action="{{ '/docs/tab84/save' }}">
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
                            <label for="kol_vo_worker" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Численность сотрудников, работающих на ОПО, успешно прошедших обучение</label>

                            <div class="col-md-6">
                                <input id="kol_vo_worker" type="text" style="width: 450px" class="form-control @error('kol_vo_worker') is-invalid @enderror" name="kol_vo_worker" value="{{ old('kol_vo_worker') }}" required autocomplete="kol_vo_worker" autofocus>

                                @error('kol_vo_worker')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="result_ready" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Заключение о готовности/неготовности работников к действиям по локализации и ликвидации последствий аварии</label>

                            <div class="col-md-6">
                                <input id="result_ready" type="text" style="width: 450px" class="form-control @error('result_ready') is-invalid @enderror" name="result_ready" value="{{ old('result_ready') }}" required autocomplete="result_ready" autofocus>

                                @error('result_ready')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Комментарий к оценке готовности</label>

                            <div class="col-md-6">
                                <input id="comment" type="text" style="width: 450px" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="comment" autofocus>

                                @error('comment')
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
