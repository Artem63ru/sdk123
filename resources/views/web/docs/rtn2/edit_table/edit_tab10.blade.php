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
                <div style="background: #FFFFFF; height:33rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab10') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                                <div class="card-header">
                                    <div class="form-inline">
                                        <div class="col-4">
                            <label for="time" style="padding-left: 35px">Фамилия</label>
                                        </div>
                            <div class="col-4">
                                <input id="fam" style="width: 450px" type="text" class="form-control @error('fam') is-invalid @enderror" name="fam" value="{{ $data_table->fam }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>
                                    </div>

                                            <div class="form-inline">
                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Имя</label>
                                                </div>
                                <div class="col-4">
                                    <input id="name" style="width: 450px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data_table->name }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                            </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Отчество</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="otch" style="width: 450px" type="text" class="form-control" name="otch" value="{{ $data_table->otch }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                    </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Должность</label>
                                                                </div>
                                <div class="col-4">
                                    <input id="position" style="width: 450px" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $data_table->position }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                            </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Подпись/усиленная квалифицированная подпись</label>
                                                                        </div>
                                <div class="col-4">
                                    <input id="sign" style="width: 450px" type="text" class="form-control" name="sign" value="{{ $data_table->sign }}" autocomplete="name" autofocus>
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


    @include('web.include.modal.datapicker')


@endsection
