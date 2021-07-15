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
                    <form method="POST" action="{{ '/docs/tab10/save' }}">
                        @csrf
                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание новой записи</h2></div>

                        <div class="card-header">
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
                            <label for="position" style="padding-left: 35px">Должность</label>
                                        </div>
                                        <div class="col-4">
                                <input id="position" type="text" style="width: 450px; margin-top: 7px" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus>

                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                                        <div class="form-inline">
                                            <div class="col-4">
                            <label for="sign" style="padding-left: 35px">Подпись/усиленная квалифицированная подпись</label>
                                            </div>
                                            <div class="col-4">
                                <input id="sign" type="text" style="width: 450px; margin-top: 7px" class="form-control" name="sign" value="{{ old('sign') }}" autocomplete="sign" autofocus>

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
