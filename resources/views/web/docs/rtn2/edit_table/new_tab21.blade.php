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
                    <div style="background: #FFFFFF; height:35rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab21/save' }}">
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
                            <label for="name_f" style="padding-left: 35px">Фамилия</label>
                                </div>
                                <div class="col-4">

                                <input id="name_f" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name_f') is-invalid @enderror" name="name_f" value="{{ old('name_f') }}" required autocomplete="name_f" autofocus>

                                @error('name_f')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="name_n" style="padding-left: 35px">Имя</label>
                                </div>
                                <div class="col-4">
                                <input id="name_n" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name_n') is-invalid @enderror" name="name_n" value="{{ old('name_n') }}" required autocomplete="name_n" autofocus>

                                @error('name_n')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="name_o" style="padding-left: 35px">Отчество</label>
                                </div>
                                <div class="col-4">
                                <input id="name_o" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name_o') is-invalid @enderror" name="name_o" value="{{ old('name_o') }}" required autocomplete="name_o" autofocus>

                                @error('name_o')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-inline">
                                <div class="col-4">
                            <label for="post" style="padding-left: 35px">Должность</label>
                                </div>
                                <div class="col-4">
                                <input id="post" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required autocomplete="post" autofocus>

                                @error('post')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
                            <label for="experiens" style="padding-left: 35px">Стаж работы в отрасли</label>
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
