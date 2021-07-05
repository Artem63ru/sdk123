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
                        margin-bottom: 0.5rem;
                    }
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
                    <form method="POST" action="{{ route('update_tab11') }}">
                        @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование
                                записи</h2></div>

                        <div class="card-header">
                            <div class="form-inline">
                                <div class="col-4">
                                    <label for="num_opo" style="padding-left: 35px"
                                    >Регистрационный номер ОПО</label>
                                </div>
                                <div class="col-4">
                                    <input id="num_opo" style="width: 450px; margin-top: 7px" type="text"
                                           class="form-control @error('num_opo') is-invalid @enderror" name="num_opo"
                                           value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}">
                                </div>
                            </div>


                            <div class="form-inline">
                                <div class="col-4">
                                    <label for="num_polis" style="padding-left: 35px"
                                    >Номер полиса</label>
                                </div>
                                <div class="col-4">
                                    <input id="num_polis" style="width: 450px; margin-top: 7px" type="text"
                                           class="form-control @error('num_polis') is-invalid @enderror"
                                           name="num_polis"
                                           value="{{ $data_table->num_polis }}" required autocomplete="name" autofocus>

                                </div>
                            </div>


                            <div class="form-inline">
                                <div class="col-4">
                                    <label for="time" style="padding-left: 35px"
                                    >Срок действия полиса</label>
                                </div>
                                <div class="col-4">

                                    <input id="time" type="date" style="width: 450px; margin-top: 7px"
                                           class="form-control  @error('time') is-invalid @enderror" name="time"
                                           value="{{ $data_table->time }}" required autocomplete="time" autofocus>
                                </div>
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


            </div>
            </form>
        </div>
    </div>
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    @include('web.include.modal.datapicker')--}}


@endsection
