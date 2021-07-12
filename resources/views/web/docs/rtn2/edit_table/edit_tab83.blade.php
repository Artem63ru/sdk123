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
        <div class="inside_tab_padding" style="height: 600px">
            <div class="row_block">
                <style>
                     label {
                        display: block;
                        margin-bottom: 0.5rem;}
                </style>
                <div style="background: #FFFFFF; height:49rem; padding: 35px; border-radius: 6px"
                     class="container">


                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="POST" action="{{ route('update_tab83') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                                <div class="card-header">
                                    <div class="form-inline">
                                        <div class="col-4">
                            <label for="time" style="padding-left: 35px">Регистрационный номер ОПО</label>
                                        </div>
                            <div class="col-4">
                                <input id="num_opo" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>
                            </div>

                                            <div class="form-inline">
                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Информация о мероприятиях по локализации и ликвидации последствий аварий, дата утверждения руководителем организации</label>
                                                </div>
                                                    <div class="col-4">
                                    <input id="info_event" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('info_event') is-invalid @enderror" name="info_event" value="{{ $data_table->info_event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Файл с информацией по планируемым мероприятиям, с указанием наименования и реквизитов</label>
                                                        </div>
                                                            <div class="col-4">
                                    <input id="file_info" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('file_info') is-invalid @enderror" name="file_info" value="{{ $data_table->file_info }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Наличие договора на обслуживание с профессиональными аварийно-спасательными службами или с профессиональными аварийно-спасательными формированиями</label>
                                                                </div>
                                                                    <div class="col-4">
                                    <input id="check_agreement" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('check_agreement') is-invalid @enderror" name="check_agreement" value="{{ $data_table->check_agreement }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата заключения договора на обслуживание</label>
                                                                        </div>
                                                                            <div class="col-4">
                                    <input id="date_agreement" style="width: 450px; margin-top: 7px" type="date" class="form-control" name="date_agreement" value="{{ $data_table->date_agreement }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Номер договора на обслуживание</label>
                                                                                </div>
                                <div class="col-4">
                                    <input id="nym_agreement" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="nym_agreement" value="{{ $data_table->nym_agreement }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Дата окончания договора на обслуживание</label>
                                                                                        </div>
                                <div class="col-4">
                                    <input id="date_end_agreement" style="width: 450px; margin-top: 7px" type="date" class="form-control" name="date_end_agreement" value="{{ $data_table->date_end_agreement }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                            <div class="form-inline">
                                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Исполнитель по договору на обслуживание</label>
                                                                                                </div>
                                <div class="col-4">
                                    <input id="isp_agreement" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="isp_agreement" value="{{ $data_table->isp_agreement }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
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
                            </form>
                </div>
            </div>
        </div>
    </div>


@endsection
