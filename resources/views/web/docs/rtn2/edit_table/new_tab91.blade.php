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
                    <form method="POST" action="{{ '/docs/tab91/save' }}">
                        @csrf
                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание новой записи</h2></div>

                        <div class="form-group row">
                            <label for="num_opo" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Регистрационный номер ОПО</label>

                            <div class="col-md-6">
                                <input id="num_opo" type="text" style="width: 450px" class="form-control @error('num_opo') is-invalid @enderror" name="num_opo" value="{{ old('num_opo') }}" required autocomplete="num_opo" autofocus>

                                @error('num_opo')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_event" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Наименование мероприятия</label>

                            <div class="col-md-6">
                                <input id="name_event" type="text" style="width: 450px" class="form-control @error('name_event') is-invalid @enderror" name="name_event" value="{{ old('name_event') }}" required autocomplete="name_event" autofocus>

                                @error('name_event')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" style="padding-left: 35px" class="col-md-4 col-form-label text-md-right">Срок выполнения</label>

                            <div class="col-md-6">
                                <input id="time" type="date" style="width: 450px" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>

                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
