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
                    <form method="POST" action="{{ '/docs/tab51/save' }}">
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
                            <label for="kol_vo_breach" style="padding-left: 35px">Количество выявленных нарушений</label>
                                </div>
                            <div class="col-4">

                                <input id="kol_vo_breach" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_breach') is-invalid @enderror" name="kol_vo_breach" value="{{ old('kol_vo_breach') }}" required autocomplete="kol_vo_breach" autofocus>

                                @error('kol_vo_breach')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_breach_nonpref" style="padding-left: 35px">Количество нарушений, не устраненных в установленные сроки</label>
                                </div>
                            <div class="col-4">

                                <input id="kol_vo_breach_nonpref" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_breach_nonpref') is-invalid @enderror" name="kol_vo_breach_nonpref" value="{{ old('kol_vo_breach_nonpref') }}" required autocomplete="kol_vo_breach_nonpref" autofocus>

                                @error('kol_vo_breach_nonpref')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="kol_vo_attraction" style="padding-left: 35px">Количество привлечений работников за нарушения требований промышленной безопасности по представлению работника, ответственного за осуществление производственного контроля, или службы производственного контроля</label>
                                </div>
                            <div class="col-4">

                                <input id="kol_vo_attraction" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('kol_vo_attraction') is-invalid @enderror" name="kol_vo_attraction" value="{{ old('kol_vo_attraction') }}" required autocomplete="kol_vo_attraction" autofocus>

                                @error('kol_vo_attraction')
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
