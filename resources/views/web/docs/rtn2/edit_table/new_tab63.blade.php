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
                    <form method="POST" action="{{ '/docs/tab63/save' }}">
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
                            <label for="kol_vo_tu" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Общее количество технических устройств</label>

                            <div class="col-md-6">
                                <input id="kol_vo_tu" type="text" style="width: 450px" class="form-control @error('kol_vo_tu') is-invalid @enderror" name="kol_vo_tu" value="{{ old('kol_vo_tu') }}" required autocomplete="kol_vo_tu" autofocus>

                                @error('kol_vo_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kol_vo_old_tu" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество ТУ с истекшим сроком эксплуатации</label>

                            <div class="col-md-6">
                                <input id="kol_vo_old_tu" type="text" style="width: 450px" class="form-control @error('kol_vo_old_tu') is-invalid @enderror" name="kol_vo_old_tu" value="{{ old('kol_vo_old_tu') }}" required autocomplete="kol_vo_old_tu" autofocus>

                                @error('kol_vo_old_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_tu_out" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл, где приводится информация по количеству выведенных и находящихся в эксплуатации из этих ТУ</label>

                            <div class="col-md-6">
                                <input id="file_tu_out" type="text" style="width: 450px" class="form-control @error('file_tu_out') is-invalid @enderror" name="file_tu_out" value="{{ old('file_tu_out') }}" required autocomplete="file_tu_out" autofocus>

                                @error('file_tu_out')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kol_vo_repair_tu" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество замененных, модернизированных, вновь введенных в эксплуатацию ТУ за отчетный период</label>

                            <div class="col-md-6">
                                <input id="kol_vo_repair_tu" type="text" style="width: 450px" class="form-control @error('kol_vo_repair_tu') is-invalid @enderror" name="kol_vo_repair_tu" value="{{ old('kol_vo_repair_tu') }}" required autocomplete="kol_vo_repair_tu" autofocus>

                                @error('kol_vo_repair_tu')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_tu_repair" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл, где приводится перечисление ТУ или номера ТУ, которые заменены, с указанием номеров, замененных ТУ или отремонтированных ТУ</label>

                            <div class="col-md-6">
                                <input id="file_tu_repair" type="text" style="width: 450px" class="form-control" name="file_tu_repair" value="{{ old('file_tu_repair') }}" autocomplete="file_tu_repair" autofocus>

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
