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
        <div class="inside_tab_padding" style="height: 600px">
            <div class="row_block">
                <style>
                     label {
                        display: block;
                        margin-bottom: 0.5rem;}
                </style>
                <div style="background: #FFFFFF; height:60rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab4') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наименование мероприятия</label>
                                <div class="form-group">
                                    <input id="name_event" style="width: 450px" type="text" class="form-control @error('name_event') is-invalid @enderror" name="name_event" value="{{ $data_table->name_event }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Дата выполнения</label>
                                <div class="form-group">
                                    <input id="date_accept" style="width: 450px" type="date" class="form-control" name="date_accept" value="{{ $data_table->date_accept }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Отметка о выполнении</label>
                                <div class="form-group">
                                    <input id="check_event" style="width: 450px" type="text" class="form-control" name="check_event" value="{{ $data_table->check_event }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл с указанием ссылок на оформленные документы</label>
                                <div class="form-group">
                                    <input id="file" style="width: 800px" type="text" class="form-control" name="file" value="{{ $data_table->file }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Причины невыполнения</label>
                                <div class="form-group">
                                    <input id="reason_nonpref" style="width: 800px" type="text" class="form-control" name="reason_nonpref" value="{{ $data_table->reason_nonpref }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Реквизиты (дата) заключения экспертизы промышленной безопасности обоснования безопасности опасного производственного объекта</label>
                                <div class="form-group">
                                    <input id="recvisits_1" style="width: 450px" type="data" class="form-control" name="recvisits_1" value="{{ $data_table->recvisits_1 }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Реквизиты (рег номер) заключения экспертизы промышленной безопасности обоснования безопасности опасного производственного объекта</label>
                                <div class="form-group">
                                    <input id="recvisits_2" style="width: 450px" type="text" class="form-control" name="recvisits_2" value="{{ $data_table->recvisits_2 }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Информация о выполнении/невыполнении требований обоснования безопасности</label>
                                <div class="form-group">
                                    <input id="check_require" style="width: 450px" type="text" class="form-control @error('check_require') is-invalid @enderror" name="check_require" value="{{ $data_table->check_require }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Ссылки на офиициальные документы</label>
                                <div class="form-group">
                                    <input id="doc" style="width: 450px" type="text" class="form-control" name="doc" value="{{ $data_table->doc }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Причины невыполнения требований обоснования безопасности</label>
                                <div class="form-group">
                                    <input id="reason_nonpref_require" style="width: 450px" type="text" class="form-control" name="reason_nonpref_require" value="{{ $data_table->reason_nonpref_require }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>


                        <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" style="margin-left: 46%; margin-top: 30px" class="bat_add">Сохранить</button>
                        </div>

                    </form>
                            </div>
                        </div>
                    </div>
                </div>


    @include('web.include.modal.datapicker')


@endsection
