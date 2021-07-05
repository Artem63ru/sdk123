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
                    <div style="background: #FFFFFF; height:41rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab83/save' }}">
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
                            <label for="info_event" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Информация о мероприятиях по локализации и ликвидации последствий аварий, дата утверждения руководителем организации</label>

                            <div class="col-md-6">
                                <input id="info_event" type="text" style="width: 450px" class="form-control @error('info_event') is-invalid @enderror" name="info_event" value="{{ old('info_event') }}" required autocomplete="info_event" autofocus>

                                @error('info_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_info" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл с информацией по планируемым мероприятиям, с указанием наименования и реквизитов</label>

                            <div class="col-md-6">
                                <input id="file_info" type="text" style="width: 450px" class="form-control @error('file_info') is-invalid @enderror" name="file_info" value="{{ old('file_info') }}" required autocomplete="file_info" autofocus>

                                @error('file_info')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_agreement" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наличие договора на обслуживание с профессиональными аварийно-спасательными службами</label>

                            <div class="col-md-6">
                                <input id="check_agreement" type="text" style="width: 450px" class="form-control @error('check_agreement') is-invalid @enderror" name="check_agreement" value="{{ old('check_agreement') }}" required autocomplete="check_agreement" autofocus>

                                @error('check_agreement')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_agreement" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата заключения договора на обслуживание</label>

                            <div class="col-md-6">
                                <input id="date_agreement" type="date" style="width: 450px" class="form-control" name="date_agreement" value="{{ old('date_agreement') }}" autocomplete="date_agreement" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nym_agreement" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Номер договора на обслуживание</label>

                            <div class="col-md-6">
                                <input id="nym_agreement" type="text" style="width: 450px" class="form-control" name="nym_agreement" value="{{ old('nym_agreement') }}" autocomplete="nym_agreement" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_end_agreement" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата окончания договора на обслуживание</label>

                            <div class="col-md-6">
                                <input id="date_end_agreement" type="date" style="width: 450px" class="form-control" name="date_end_agreement" value="{{ old('date_end_agreement') }}" autocomplete="date_end_agreement" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isp_agreement" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Исполнитель по договору на обслуживание</label>

                            <div class="col-md-6">
                                <input id="isp_agreement" type="text" style="width: 450px" class="form-control" name="isp_agreement" value="{{ old('isp_agreement') }}" autocomplete="isp_agreement" autofocus>

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
