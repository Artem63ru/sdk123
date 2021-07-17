@extends('web.layouts.app')
@section('title')
    Справка
@endsection

@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @include('web.include.sidebar_doc')


    <div class="top_table">
        @include('web.include.toptable')
    </div>

    <div class="card-header" style="width: 1242px"><h2 class="text-muted" style="text-align: center" >Создание предписания РТН</h2>

        <div class="inside_tab_padding" style="margin-right: 20px; width: 1250px">

            <div style="background: #FFFFFF; border-radius: 6px; width: 1210px" class="row_block form51">

                {!! Form::open(array('route' => 'store_RTN','method'=>'POST')) !!}
                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Содержание предписания</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::textarea('descr', null, array('placeholder' => 'Укажите содержание предписания','style' => 'height: 3vh; width: 95%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Дата предписания</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::date('date', null, array('placeholder' => 'Укажите дату предписания','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Статус</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::checkbox('status', null, array('placeholder' => 'Укажите дату предписания','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Наименование ОПО</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::select('from_opo', array('1' => 'Фонд скважин', '2' => 'СПТ-ГКП', '3' => 'УКПГ-1', '4' => 'УКПГ-2', '5' => 'УКПГ-3A', '6' => 'УКПГ-4', '7' => 'УКПГ-6', '8' => 'УКПГ-9', '9' => 'УПТР'), null, ['style' => 'width: 70%', 'class'=>'form-control']) !!}
{{--                                {!! Form::text('from_opo', null, array('placeholder' => 'Укажите год','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}--}}
                            </div>
                        </div>
                    </div>
                </div>



                <div style="padding-bottom: 40px; margin-top: 20px"
                     class="text-center">
                    <button type="submit" class="btn btn-outline-success">Сохранить
                    </button>
                    <a href={{"/docs/predRTN"}}>
                        <button type="button" class="btn btn-outline-dark">Отменить
                        </button>
                    </a>
                </div>

            {!! Form::close() !!}

            </div>
        </div>

    </div>


    @include('web.include.modal.datapicker')
@endsection
