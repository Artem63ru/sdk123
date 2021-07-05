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
                    <div style="background: #FFFFFF; height:35rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab21/save' }}">
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
                            <label for="name_f" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                            <div class="col-md-6">
                                <input id="name_f" type="text" style="width: 450px" class="form-control @error('name_f') is-invalid @enderror" name="name_f" value="{{ old('name_f') }}" required autocomplete="name_f" autofocus>

                                @error('name_f')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_n" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="name_n" type="text" style="width: 450px" class="form-control @error('name_n') is-invalid @enderror" name="name_n" value="{{ old('name_n') }}" required autocomplete="name_n" autofocus>

                                @error('name_n')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_o" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Отчество</label>

                            <div class="col-md-6">
                                <input id="name_o" type="text" style="width: 450px" class="form-control @error('name_o') is-invalid @enderror" name="name_o" value="{{ old('name_o') }}" required autocomplete="name_o" autofocus>

                                @error('name_o')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Должность</label>

                            <div class="col-md-6">
                                <input id="post" type="text" style="width: 450px" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required autocomplete="post" autofocus>

                                @error('post')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="education" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Образование/квалификация</label>

                            <div class="col-md-6">
                                <input id="education" type="text" style="width: 450px" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education" autofocus>

                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experiens" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Стаж работы в отрасли</label>

                            <div class="col-md-6">
                                <input id="experiens" type="text" style="width: 450px" class="form-control @error('experiens') is-invalid @enderror" name="experiens" value="{{ old('experiens') }}" required autocomplete="experiens" autofocus>

                                @error('experiens')
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
