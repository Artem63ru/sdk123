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
                     class="container">
                    <form method="POST" action="{{ '/docs/tab11/save' }}">
                        @csrf
                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание новой
                                записи</h2></div>

                        <div class="card-header">
                            <div class="form-inline">
                                <div class="col-4">
                                    <label for="num_opo" style="padding-left: 35px">Регистрационный номер ОПО</label>
                                </div>
                                <div class="col-4">
                                    <input id="num_opo" type="text" style="width: 450px; margin-top: 7px"
                                           class="form-control @error('num_opo') is-invalid @enderror" name="num_opo"
                                           value="{{ old('num_opo') }}" required autocomplete="num_opo" autofocus>

                                    @error('num_opo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="col-4">
                                <label for="num_polis" style="padding-left: 35px"
                                     >Номер полиса</label>
                                </div>
                                <div class="col-4">
                                    <input id="num_polis" type="text" style="width: 450px; margin-top: 7px"
                                           class="form-control @error('num_polis') is-invalid @enderror"
                                           name="num_polis" value="{{ old('num_polis') }}" required
                                           autocomplete="num_polis" autofocus>

                                    @error('num_polis')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="col-4">
                                <label for="time" style="padding-left: 35px"
                                     >Срок действия полиса</label>
                                </div>
                                <div class="col-4">
                                    <input id="time" type="date" style="width: 450px; margin-top: 7px"
                                           class="form-control @error('time') is-invalid @enderror" name="time"
                                           value="{{ old('time') }}" required autocomplete="time" autofocus>

                                    @error('time')
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

@endsection
