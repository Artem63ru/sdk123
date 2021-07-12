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
                <div style="background: #FFFFFF; height:47rem; padding: 35px; border-radius: 6px"
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
                            <form method="POST" action="{{ route('update_tab81') }}">
                                @csrf

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование записи</h2></div>

                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>
                            <div class="form-group">
                                <input id="num_opo" style="width: 450px" type="text" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ $data_table->num_opo }}" required autocomplete="name" autofocus>
                                <input type="hidden" name="id" value="{{ $data_table->id }}" >
                            </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Фамилия</label>
                                <div class="form-group">
                                    <input id="fam" style="width: 450px" type="text" class="form-control @error('fam') is-invalid @enderror" name="fam" value="{{ $data_table->fam }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Имя</label>
                                <div class="form-group">
                                    <input id="name" style="width: 450px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data_table->name }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Отчество</label>
                                <div class="form-group">
                                    <input id="otch" style="width: 450px" type="text" class="form-control" name="otch" value="{{ $data_table->otch }}" autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Образование/квалификация</label>
                                <div class="form-group">
                                    <input id="education" style="width: 450px" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ $data_table->education }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Стаж работы в области промышленной безопасности</label>
                                <div class="form-group">
                                    <input id="experiens" style="width: 450px" type="text" class="form-control @error('experiens') is-invalid @enderror" name="experiens" value="{{ $data_table->experiens }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наличие резервов финансовых средств и материальных ресурсов для локализации и ликвидации последствий аварий</label>
                                <div class="form-group">
                                    <input id="check_resurs" style="width: 450px" type="text" class="form-control @error('check_resurs') is-invalid @enderror" name="check_resurs" value="{{ $data_table->check_resurs }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{ $data_table->id }}" >
                                </div>

                                <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наличие систем наблюдения, оповещения, связи и поддержки действий в случае аварии</label>
                                <div class="form-group">
                                    <input id="check_system_monitoring" style="width: 450px" type="text" class="form-control @error('check_system_monitoring') is-invalid @enderror" name="check_system_monitoring" value="{{ $data_table->check_system_monitoring }}" required autocomplete="name" autofocus>
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
