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
                            <form method="POST" action="{{ route('update_tab51') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество выявленных нарушений</label>
                                <div class="form-group">
                                    <input id="kol_vo_breach" style="width: 450px" type="text" class="form-control @error('kol_vo_breach') is-invalid @enderror" name="kol_vo_breach" value="{{ $data_table->kol_vo_breach }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество нарушений, не устраненных в установленные сроки</label>
                                <div class="form-group">
                                    <input id="kol_vo_breach_nonpref" style="width: 450px" type="text" class="form-control @error('kol_vo_breach_nonpref') is-invalid @enderror" name="kol_vo_breach_nonpref" value="{{ $data_table->kol_vo_breach_nonpref }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Количество привлечений работников за нарушения требований промышленной безопасности по представлению работника, ответственного за осуществление производственного контроля, или службы производственного контроля</label>
                                <div class="form-group">
                                    <input id="kol_vo_attraction" style="width: 450px" type="text" class="form-control @error('kol_vo_attraction') is-invalid @enderror" name="kol_vo_attraction" value="{{ $data_table->kol_vo_attraction }}" required autocomplete="name" autofocus>
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
