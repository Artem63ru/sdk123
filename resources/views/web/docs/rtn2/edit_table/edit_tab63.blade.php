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

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Общее количество технических устройств</label>
                                <div class="form-group">
                                    <input id="kol_vo_tu" style="width: 450px" type="text" class="form-control @error('kol_vo_tu') is-invalid @enderror" name="kol_vo_tu" value="{{ $data_table->kol_vo_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество ТУ с истекшим сроком эксплуатации</label>
                                <div class="form-group">
                                    <input id="kol_vo_old_tu" style="width: 450px" type="text" class="form-control @error('kol_vo_old_tu') is-invalid @enderror" name="kol_vo_old_tu" value="{{ $data_table->kol_vo_old_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл, где приводится информация по количеству выведенных и находящихся в эксплуатации из этих ТУ</label>
                                <div class="form-group">
                                    <input id="file_tu_out" style="width: 450px" type="text" class="form-control @error('file_tu_out') is-invalid @enderror" name="file_tu_out" value="{{ $data_table->file_tu_out }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество замененных, модернизированных, вновь введенных в эксплуатацию ТУ за отчетный период</label>
                                <div class="form-group">
                                    <input id="kol_vo_repair_tu" style="width: 450px" type="text" class="form-control @error('kol_vo_repair_tu') is-invalid @enderror" name="kol_vo_repair_tu" value="{{ $data_table->kol_vo_repair_tu }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Файл, где приводится перечисление ТУ или номера ТУ, которые заменены, с указанием номеров, замененных ТУ или отремонтированных ТУ</label>
                                <div class="form-group">
                                    <input id="file_tu_repair" style="width: 450px" type="text" class="form-control" name="file_tu_repair" value="{{ $data_table->file_tu_repair }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>




                                <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" style="margin-left: 46%; margin-top: 30px" class="bat_add">Сохранить</button>
                        </div>

                    </form>
                            </div>
                        </div>
                    </div>
                </div>


    @include('web.include.modal.datapicker')


@endsection
