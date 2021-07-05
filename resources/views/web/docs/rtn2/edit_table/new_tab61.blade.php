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
                    <form method="POST" action="{{ '/docs/tab61/save' }}">
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
                            <label for="kol_vo_building" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Общее количество зданий, входящих в состав ОПО</label>

                            <div class="col-md-6">
                                <input id="kol_vo_building" type="text" style="width: 450px" class="form-control @error('kol_vo_building') is-invalid @enderror" name="kol_vo_building" value="{{ old('kol_vo_building') }}" required autocomplete="kol_vo_building" autofocus>

                                @error('kol_vo_building')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kol_vo_build" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Общее количество сооружений, входящих в состав ОПО</label>

                            <div class="col-md-6">
                                <input id="kol_vo_build" type="text" style="width: 450px" class="form-control @error('kol_vo_build') is-invalid @enderror" name="kol_vo_build" value="{{ old('kol_vo_build') }}" required autocomplete="kol_vo_build" autofocus>

                                @error('kol_vo_build')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="kol_vo_operated_obj" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество зданий и сооружений с продленным сроком эксплуатации</label>

                            <div class="col-md-6">
                                <input id="kol_vo_operated_obj" type="text" style="width: 450px" class="form-control @error('kol_vo_operated_obj') is-invalid @enderror" name="kol_vo_operated_obj" value="{{ old('kol_vo_operated_obj') }}" required autocomplete="kol_vo_operated_obj" autofocus>

                                @error('kol_vo_operated_obj')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kol_vo_nonoperated_obj" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество зданий и сооружений, выведенных из эксплуатации</label>

                            <div class="col-md-6">
                                <input id="kol_vo_nonoperated_obj" type="text" style="width: 450px" class="form-control @error('kol_vo_nonoperated_obj') is-invalid @enderror" name="kol_vo_nonoperated_obj" value="{{ old('kol_vo_nonoperated_obj') }}" required autocomplete="kol_vo_nonoperated_obj" autofocus>

                                @error('kol_vo_nonoperated_obj')
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
