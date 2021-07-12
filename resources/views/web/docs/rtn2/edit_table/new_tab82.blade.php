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
                    <div style="background: #FFFFFF; height:37rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab82/save' }}">
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
                            <label for="date_accept" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата утверждения ПМЛА руководителем организации</label>

                            <div class="col-md-6">
                                <input id="date_accept" type="date" style="width: 450px" class="form-control @error('date_accept') is-invalid @enderror" name="date_accept" value="{{ old('date_accept') }}" required autocomplete="date_accept" autofocus>

                                @error('date_accept')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Срок действия ПМЛА</label>

                            <div class="col-md-6">
                                <input id="time" type="date" style="width: 450px" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>

                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_service" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наименование профессиональной аварийно-спасательной службы или аварийно-спасательного формирования</label>

                            <div class="col-md-6">
                                <input id="name_service" type="text" style="width: 450px" class="form-control @error('name_service') is-invalid @enderror" name="name_service" value="{{ old('name_service') }}" required autocomplete="name_service" autofocus>

                                @error('name_service')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time_evidence" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Срок действия свидетельства о праве ведения соответствующих работ на ОПО</label>

                            <div class="col-md-6">
                                <input id="time_evidence" type="date" style="width: 450px" class="form-control @error('time_evidence') is-invalid @enderror" name="time_evidence" value="{{ old('time_evidence') }}" required autocomplete="time_evidence" autofocus>

                                @error('time_evidence')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="info_other_service" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Сведения о наличии нештатных аварийно-спасательных формирований из числа работников</label>

                            <div class="col-md-6">
                                <input id="info_other_service" type="text" style="width: 450px" class="form-control @error('info_other_service') is-invalid @enderror" name="info_other_service" value="{{ old('info_other_service') }}" required autocomplete="info_other_service" autofocus>

                                @error('info_other_service')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pmla_copy" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Копия действующего ПМЛА (в случае ее ненаправления ранее)</label>

                            <div class="col-md-6">
                                <input id="pmla_copy" type="text" style="width: 450px" class="form-control @error('pmla_copy') is-invalid @enderror" name="pmla_copy" value="{{ old('pmla_copy') }}" required autocomplete="pmla_copy" autofocus>

                                @error('pmla_copy')
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
