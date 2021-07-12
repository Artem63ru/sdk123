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
                <div style="background: #FFFFFF; height:42rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab82') }}">
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
                                <label for="time" style="padding-left: 35px">Дата утверждения ПМЛА руководителем организации</label>
                                                </div>
                                <div class="col-4">
                                    <input id="date_accept" style="width: 450px; margin-top: 7px" type="date" class="form-control @error('date_accept') is-invalid @enderror" name="date_accept" value="{{ $data_table->date_accept }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Срок действия ПМЛА</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="time" style="width: 450px; margin-top: 7px" type="date" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $data_table->time }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Наименование профессиональной аварийно-спасательной службы или аварийно-спасательного формирования</label>
                                                                </div>
                                                                    <div class="col-4">
                                    <input id="name_service" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('name_service') is-invalid @enderror" name="name_service" value="{{ $data_table->name_service }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Срок действия свидетельства о праве ведения соответствующих работ на ОПО</label>
                                                                        </div>
                                                                            <div class="col-4">
                                    <input id="time_evidence" style="width: 450px; margin-top: 7px" type="date" class="form-control @error('time_evidence') is-invalid @enderror" name="time_evidence" value="{{ $data_table->time_evidence }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Сведения о наличии нештатных аварийно-спасательных формирований из числа работников</label>
                                                                                </div>
                                                                                    <div class="col-4">
                                    <input id="info_other_service" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('info_other_service') is-invalid @enderror" name="info_other_service" value="{{ $data_table->info_other_service }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                </div>

                                                                                    <div class="form-inline">
                                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Копия действующего ПМЛА</label>
                                                                                        </div>
                                <div class="col-4">
                                    <input id="pmla_copy" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('pmla_copy') is-invalid @enderror" name="pmla_copy" value="{{ $data_table->pmla_copy }}" required autocomplete="name" autofocus>
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
