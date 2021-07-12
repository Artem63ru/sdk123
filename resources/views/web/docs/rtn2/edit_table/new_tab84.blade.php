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
                    <form method="POST" action="{{ '/docs/tab84/save' }}">
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
                            <label for="kol_vo_worker" style="padding-left: 35px">Численность сотрудников, работающих на ОПО, успешно прошедших обучение</label>
                                </div>
                            <div class="col-4">
                                <input id="kol_vo_worker" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_worker') is-invalid @enderror" name="kol_vo_worker" value="{{ old('kol_vo_worker') }}" required autocomplete="kol_vo_worker" autofocus>

                                @error('kol_vo_worker')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="result_ready" style="padding-left: 35px">Заключение о готовности/неготовности работников к действиям по локализации и ликвидации последствий аварии</label>
                                </div>
                            <div class="col-4">
                                <input id="result_ready" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('result_ready') is-invalid @enderror" name="result_ready" value="{{ old('result_ready') }}" required autocomplete="result_ready" autofocus>

                                @error('result_ready')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="comment" style="padding-left: 35px">Комментарий к оценке готовности</label>
                                </div>
                            <div class="col-4">
                                <input id="comment" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="comment" autofocus>

                                @error('comment')
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
