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
                    <div style="background: #FFFFFF; height:50rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab4/save' }}">
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
                            <label for="name_event" style="padding-left: 35px">Наименование мероприятия</label>
                                </div>
                                <div class="col-4">
                                <input id="name_event" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name_event') is-invalid @enderror" name="name_event" value="{{ old('name_event') }}" required autocomplete="name_event" autofocus>

                                @error('name_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="date_accept" style="padding-left: 35px">Дата выполнения</label>
                                </div>
                                <div class="col-4">
                                <input id="date_accept" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="date_accept" value="{{ old('date_accept') }}" autocomplete="date_accept" autofocus>

                            </div>
                        </div>


                            <div class="form-inline">
                                <div class="col-4">
                            <label for="check_event" style="padding-left: 35px">Отметка о выполнении</label>
                                </div>
                                <div class="col-4">
                                <input id="check_event" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="check_event" value="{{ old('check_event') }}" autocomplete="check_event" autofocus>
                            </div>
                        </div>

                                <div class="form-inline">
                                    <div class="col-4">
                            <label for="file" style="padding-left: 35px">Файл с указанием ссылок на оформленные документы</label>
                                    </div>
                                    <div class="col-4">
                                <input id="file" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="file" value="{{ old('file') }}" autocomplete="file" autofocus>
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="reason_nonpref" style="padding-left: 35px">Причины невыполнения</label>
                                </div>
                                <div class="col-4">
                                <input id="reason_nonpref" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="reason_nonpref" value="{{ old('reason_nonpref') }}" autocomplete="reason_nonpref" autofocus>
                            </div>
                        </div>

                                <div class="form-inline">
                                    <div class="col-4">
                            <label for="recvisits_1" style="padding-left: 35px">Реквизиты (дата) заключения экспертизы промышленной безопасности обоснования безопасности опасного производственного объекта</label>
                                    </div>
                                    <div class="col-4">
                                <input id="recvisits_1" type="date" style="width: 450px; margin-top: 7px" class="form-control" name="recvisits_1" value="{{ old('recvisits_1') }}" autocomplete="recvisits_1" autofocus>
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="recvisits_2" style="padding-left: 35px">Реквизиты (рег номер) заключения экспертизы промышленной безопасности обоснования безопасности опасного производственного объекта</label>
                                </div>
                                <div class="col-4">
                                <input id="recvisits_2" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="recvisits_2" value="{{ old('recvisits_2') }}"  autocomplete="recvisits_2" autofocus>
                            </div>
                        </div>

                                <div class="form-inline">
                                    <div class="col-4">
                            <label for="check_require" style="padding-left: 35px">Информация о выполнении/невыполнении требований обоснования безопасности</label>
                                    </div>
                                    <div class="col-4">
                                <input id="check_require" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('check_require') is-invalid @enderror" name="check_require" value="{{ old('check_require') }}" required autocomplete="check_require" autofocus>

                                @error('check_require')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="doc" style="padding-left: 35px">Ссылки на офиициальные документы</label>
                                </div>
                                <div class="col-4">
                                <input id="doc" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="doc" value="{{ old('doc') }}" autocomplete="doc" autofocus>
                            </div>
                        </div>

                                <div class="form-inline">
                                    <div class="col-4">
                            <label for="reason_nonpref_require" style="padding-left: 35px">Причины невыполнения требований обоснования безопасности</label>
                                    </div>
                                    <div class="col-4">
                                <input id="reason_nonpref_require" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="reason_nonpref_require" value="{{ old('reason_nonpref_require') }}" autocomplete="reason_nonpref_require" autofocus>
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
