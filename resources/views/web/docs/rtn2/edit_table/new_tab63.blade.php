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
                    <form method="POST" action="{{ '/docs/tab63/save' }}">
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
                            <label for="kol_vo_tu" style="padding-left: 35px">Общее количество технических устройств</label>
                                </div>
                            <div class="col-4">
                                <input id="kol_vo_tu" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_tu') is-invalid @enderror" name="kol_vo_tu" value="{{ old('kol_vo_tu') }}" required autocomplete="kol_vo_tu" autofocus>

                                @error('kol_vo_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_old_tu" style="padding-left: 35px">Количество ТУ с истекшим сроком эксплуатации</label>
                                </div>
                            <div class="col-4">
                                <input id="kol_vo_old_tu" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_old_tu') is-invalid @enderror" name="kol_vo_old_tu" value="{{ old('kol_vo_old_tu') }}" required autocomplete="kol_vo_old_tu" autofocus>

                                @error('kol_vo_old_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="file_tu_out" style="padding-left: 35px">Файл, где приводится информация по количеству выведенных и находящихся в эксплуатации из этих ТУ</label>
                                </div>
                            <div class="col-4">
                                <input id="file_tu_out" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('file_tu_out') is-invalid @enderror" name="file_tu_out" value="{{ old('file_tu_out') }}" required autocomplete="file_tu_out" autofocus>

                                @error('file_tu_out')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_repair_tu" style="padding-left: 35px">Количество замененных, модернизированных, вновь введенных в эксплуатацию ТУ за отчетный период</label>
                                </div>
                            <div class="col-4">
                                <input id="kol_vo_repair_tu" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_repair_tu') is-invalid @enderror" name="kol_vo_repair_tu" value="{{ old('kol_vo_repair_tu') }}" required autocomplete="kol_vo_repair_tu" autofocus>

                                @error('kol_vo_repair_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="file_tu_repair" style="padding-left: 35px">Файл, где приводится перечисление ТУ или номера ТУ, которые заменены, с указанием номеров, замененных ТУ или отремонтированных ТУ</label>
                                </div>
                            <div class="col-4">
                                <input id="file_tu_repair" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="file_tu_repair" value="{{ old('file_tu_repair') }}" autocomplete="file_tu_repair" autofocus>

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
