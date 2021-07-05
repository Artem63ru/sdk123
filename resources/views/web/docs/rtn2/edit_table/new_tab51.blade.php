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
                    <form method="POST" action="{{ '/docs/tab51/save' }}">
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
                            <label for="kol_vo_breach" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество выявленных нарушений</label>

                            <div class="col-md-6">
                                <input id="kol_vo_breach" type="text" style="width: 450px" class="form-control @error('kol_vo_breach') is-invalid @enderror" name="kol_vo_breach" value="{{ old('kol_vo_breach') }}" required autocomplete="kol_vo_breach" autofocus>

                                @error('kol_vo_breach')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kol_vo_breach_nonpref" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество нарушений, не устраненных в установленные сроки</label>

                            <div class="col-md-6">
                                <input id="kol_vo_breach_nonpref" type="text" style="width: 450px" class="form-control @error('kol_vo_breach_nonpref') is-invalid @enderror" name="kol_vo_breach_nonpref" value="{{ old('kol_vo_breach_nonpref') }}" required autocomplete="kol_vo_breach_nonpref" autofocus>

                                @error('kol_vo_breach_nonpref')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kol_vo_attraction" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество привлечений работников за нарушения требований промышленной безопасности по представлению работника, ответственного за осуществление производственного контроля, или службы производственного контроля</label>

                            <div class="col-md-6">
                                <input id="kol_vo_attraction" type="text" style="width: 450px" class="form-control @error('kol_vo_attraction') is-invalid @enderror" name="kol_vo_attraction" value="{{ old('kol_vo_attraction') }}" required autocomplete="kol_vo_attraction" autofocus>

                                @error('kol_vo_attraction')
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
