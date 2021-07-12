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
                    <form method="POST" action="{{ '/docs/tab61/save' }}">
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
                            <label for="kol_vo_building" style="padding-left: 35px">Общее количество зданий, входящих в состав ОПО</label>
                                </div>
                                        <div class="col-4">
                                <input id="kol_vo_building" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_building') is-invalid @enderror" name="kol_vo_building" value="{{ old('kol_vo_building') }}" required autocomplete="kol_vo_building" autofocus>

                                @error('kol_vo_building')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_build" style="padding-left: 35px">Общее количество сооружений, входящих в состав ОПО</label>
                                </div>
                                        <div class="col-4">
                                <input id="kol_vo_build" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_build') is-invalid @enderror" name="kol_vo_build" value="{{ old('kol_vo_build') }}" required autocomplete="kol_vo_build" autofocus>

                                @error('kol_vo_build')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_operated_obj" style="padding-left: 35px">Количество зданий и сооружений с продленным сроком эксплуатации</label>
                                </div>
                                        <div class="col-4">
                                <input id="kol_vo_operated_obj" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_operated_obj') is-invalid @enderror" name="kol_vo_operated_obj" value="{{ old('kol_vo_operated_obj') }}" required autocomplete="kol_vo_operated_obj" autofocus>

                                @error('kol_vo_operated_obj')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_nonoperated_obj" style="padding-left: 35px">Количество зданий и сооружений, выведенных из эксплуатации</label>
                                </div>
                                        <div class="col-4">
                                <input id="kol_vo_nonoperated_obj" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_nonoperated_obj') is-invalid @enderror" name="kol_vo_nonoperated_obj" value="{{ old('kol_vo_nonoperated_obj') }}" required autocomplete="kol_vo_nonoperated_obj" autofocus>

                                @error('kol_vo_nonoperated_obj')
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
