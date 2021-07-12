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
                    <div style="background: #FFFFFF; height:33rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab72/save' }}">
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
                            <label for="date_accept" style="padding-left: 35px">Дата утверждения положения</label>
                                </div>
                            <div class="col-4">
                                <input id="date_accept" type="date" style="width: 450px; margin-top: 7px" class="form-control @error('date_accept') is-invalid @enderror" name="date_accept" value="{{ old('date_accept') }}" required autocomplete="date_accept" autofocus>

                                @error('date_accept')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="info_wort_to_accept" style="padding-left: 35px">Должность лица, утвердившего положение</label>
                                </div>
                            <div class="col-4">
                                <input id="info_wort_to_accept" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('info_wort_to_accept') is-invalid @enderror" name="info_wort_to_accept" value="{{ old('info_wort_to_accept') }}" required autocomplete="info_wort_to_accept" autofocus>

                                @error('info_wort_to_accept')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="fam_wort_to_accept" style="padding-left: 35px">Фамилия лица, утвердившего положение</label>
                                </div>
                            <div class="col-4">
                                <input id="fam_wort_to_accept" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('fam_wort_to_accept') is-invalid @enderror" name="fam_wort_to_accept" value="{{ old('fam_wort_to_accept') }}" required autocomplete="fam_wort_to_accept" autofocus>

                                @error('fam_wort_to_accept')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="name_wort_to_accept" style="padding-left: 35px">Имя, лица, утвердившего положение</label>
                                </div>
                            <div class="col-4">
                                <input id="name_wort_to_accept" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('name_wort_to_accept') is-invalid @enderror" name="name_wort_to_accept" value="{{ old('name_wort_to_accept') }}" required autocomplete="name_wort_to_accept" autofocus>

                                @error('name_wort_to_accept')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-inline">
                                <div class="col-4">
                            <label for="otch_wort_to_accept" style="padding-left: 35px">Отчество (при наличии) лица, утвердившего положение</label>
                                </div>
                            <div class="col-4">
                                <input id="otch_wort_to_accept" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="otch_wort_to_accept" value="{{ old('otch_wort_to_accept') }}" autocomplete="otch_wort_to_accept" autofocus>

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
