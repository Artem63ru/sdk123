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
                    <div style="background: #FFFFFF; height:37rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab81/save' }}">
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
                            <label for="fam" style="padding-left: 35px">Фамилия</label>
                                </div>
                            <div class="col-4">
                                <input id="fam" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('fam') is-invalid @enderror" name="fam" value="{{ old('fam') }}" required autocomplete="fam" autofocus>

                                @error('fam')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="name" style="padding-left: 35px">Имя</label>
                                </div>
                            <div class="col-4">
                                <input id="name" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="otch" style="padding-left: 35px">Отчество</label>
                                </div>
                            <div class="col-4">
                                <input id="otch" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="otch" value="{{ old('otch') }}" autocomplete="otch" autofocus>
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="education" style="padding-left: 35px">Образование/квалификация</label>
                                </div>
                            <div class="col-4">
                                <input id="education" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education" autofocus>

                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="experiens" style="padding-left: 35px">Стаж работы в области промышленной безопасности</label>
                                </div>
                            <div class="col-4">
                                <input id="experiens" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('experiens') is-invalid @enderror" name="experiens" value="{{ old('experiens') }}" required autocomplete="experiens" autofocus>

                                @error('experiens')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="check_resurs" style="padding-left: 35px">Наличие резервов финансовых средств и материальных ресурсов для локализации и ликвидации последствий аварий</label>
                                </div>
                            <div class="col-4">
                                <input id="check_resurs" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('check_resurs') is-invalid @enderror" name="check_resurs" value="{{ old('check_resurs') }}" required autocomplete="check_resurs" autofocus>

                                @error('check_resurs')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="check_system_monitoring" style="padding-left: 35px">Наличие систем наблюдения, оповещения, связи и поддержки действий в случае аварии</label>
                                </div>
                            <div class="col-4">
                                <input id="check_system_monitoring" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('check_system_monitoring') is-invalid @enderror" name="check_system_monitoring" value="{{ old('check_system_monitoring') }}" required autocomplete="check_system_monitoring" autofocus>

                                @error('check_system_monitoring')
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
