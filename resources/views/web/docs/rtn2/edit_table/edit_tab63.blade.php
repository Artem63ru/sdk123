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
                <div style="background: #FFFFFF; height:36rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab63') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                                <div class="card-header">
                                    <div class="form-inline">
                                        <div class="col-4">
                            <label for="time" style="padding-left: 35px">Регистрационный номер ОПО</label>
                                        </div>
                            <div class="col-4">
                                <input id="num_opo" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>
                                        </div>

                                            <div class="form-inline">
                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Общее количество технических устройств</label>
                                                </div>
                                <div class="col-4">
                                    <input id="kol_vo_tu" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('kol_vo_tu') is-invalid @enderror" name="kol_vo_tu" value="{{ $data_table->kol_vo_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                </div>

                                                    <div class="form-inline">
                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Количество ТУ с истекшим сроком эксплуатации</label>
                                                        </div>
                                <div class="col-4">
                                    <input id="kol_vo_old_tu" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('kol_vo_old_tu') is-invalid @enderror" name="kol_vo_old_tu" value="{{ $data_table->kol_vo_old_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                        </div>

                                                            <div class="form-inline">
                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Файл, где приводится информация по количеству выведенных и находящихся в эксплуатации из этих ТУ</label>
                                                                </div>
                                <div class="col-4">
                                    <input id="file_tu_out" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('file_tu_out') is-invalid @enderror" name="file_tu_out" value="{{ $data_table->file_tu_out }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                </div>

                                                                    <div class="form-inline">
                                                                        <div class="col-4">
                                <label for="time" style="padding-left: 35px">Количество замененных, модернизированных, вновь введенных в эксплуатацию ТУ за отчетный период</label>
                                                                        </div>
                                <div class="col-4">
                                    <input id="kol_vo_repair_tu" style="width: 450px; margin-top: 7px" type="text" class="form-control @error('kol_vo_repair_tu') is-invalid @enderror" name="kol_vo_repair_tu" value="{{ $data_table->kol_vo_repair_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>
                                                                        </div>

                                                                            <div class="form-inline">
                                                                                <div class="col-4">
                                <label for="time" style="padding-left: 35px">Файл, где приводится перечисление ТУ или номера ТУ, которые заменены, с указанием номеров, замененных ТУ или отремонтированных ТУ</label>
                                                                                </div>
                                <div class="col-4">
                                    <input id="file_tu_repair" style="width: 450px; margin-top: 7px" type="text" class="form-control" name="file_tu_repair" value="{{ $data_table->file_tu_repair }}" autocomplete="name" autofocus>
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


@endsection
