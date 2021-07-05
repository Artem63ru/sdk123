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
                    <div style="background: #FFFFFF; height:33rem; padding: 35px; border-radius: 6px"
                         class="container1">
                    <form method="POST" action="{{ '/docs/tab10/save' }}">
                        @csrf
                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание новой записи</h2></div>

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
                            <label for="position" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Должность</label>

                            <div class="col-md-6">
                                <input id="position" type="text" style="width: 450px" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus>

                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sign" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Подпись/усиленная квалифицированная подпись</label>

                            <div class="col-md-6">
                                <input id="sign" type="text" style="width: 450px" class="form-control" name="sign" value="{{ old('sign') }}" autocomplete="sign" autofocus>

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
