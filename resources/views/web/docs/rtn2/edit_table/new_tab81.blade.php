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
                    <form method="POST" action="{{ '/docs/tab81/save' }}">
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
                            <label for="fam" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                            <div class="col-md-6">
                                <input id="fam" type="text" style="width: 450px" class="form-control @error('fam') is-invalid @enderror" name="fam" value="{{ old('fam') }}" required autocomplete="fam" autofocus>

                                @error('fam')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" style="width: 450px" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="otch" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Отчество</label>

                            <div class="col-md-6">
                                <input id="otch" type="text" style="width: 450px" class="form-control" name="otch" value="{{ old('otch') }}" autocomplete="otch" autofocus>
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
                            <label for="experiens" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Стаж работы в области промышленной безопасности</label>

                            <div class="col-md-6">
                                <input id="experiens" type="text" style="width: 450px" class="form-control @error('experiens') is-invalid @enderror" name="experiens" value="{{ old('experiens') }}" required autocomplete="experiens" autofocus>

                                @error('experiens')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_resurs" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наличие резервов финансовых средств и материальных ресурсов для локализации и ликвидации последствий аварий</label>

                            <div class="col-md-6">
                                <input id="check_resurs" type="text" style="width: 450px" class="form-control @error('check_resurs') is-invalid @enderror" name="check_resurs" value="{{ old('check_resurs') }}" required autocomplete="check_resurs" autofocus>

                                @error('check_resurs')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_system_monitoring" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наличие систем наблюдения, оповещения, связи и поддержки действий в случае аварии</label>

                            <div class="col-md-6">
                                <input id="check_system_monitoring" type="text" style="width: 450px" class="form-control @error('check_system_monitoring') is-invalid @enderror" name="check_system_monitoring" value="{{ old('check_system_monitoring') }}" required autocomplete="check_system_monitoring" autofocus>

                                @error('check_system_monitoring')
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
