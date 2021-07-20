@extends('web.layouts.app')
@section('title')
    Показатель безопасности ОПО
@endsection

@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @include('web.include.tb.sidebar_tb')

    <div class="top_table">
        @include('web.include.toptable')
    </div>

    <div class="inside_content">
        @include('web.include.numbs_line')
    </div>


    <style>
        label {
            display: block;
            margin-bottom: 0.5rem;
        }

    </style>
    <div style="background: #FFFFFF; overflow-y:scroll; height:34rem; padding: 20px; border-radius: 6px; margin-right: 25%"
         class="container1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">



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


        {!! Form::open(array('route' => 'failure_free.store','method'=>'POST')) !!}
        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание записи данных ручного ввода для расчета</h2></div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Год</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('year', null, array('placeholder' => 'Укажите год','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                        <input type="hidden" name="from_opo" value="{{ $id_opo }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Квартал</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('quarter', null, array('placeholder' => 'Укажите квартал','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество аварий</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('num_c1', null, array('placeholder' => 'укажите Количество аварий','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество инцидентов</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('num_c2', null, array('placeholder' => 'Укажите количество инцидентов','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество предпосылок к инцидентам</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('num_c3', null, array('placeholder' => 'Укажите количество предпосылок к инцидентам','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель безаварийности работы</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('rab', null, array('placeholder' => 'Укажите показатель безаварийности работы','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>



        <div style="padding-bottom: 40px; margin-top: 20px"
             class="text-center">
            <button type="submit" class="btn btn-outline-success">Сохранить
            </button>
            <a href={{"/opo/".$ver_opo->idOPO."/main"}}>
                <button type="button" class="btn btn-outline-dark">Отменить
                </button>
            </a>
        </div>


    </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
    @include('web.include.modal.datapicker')

@endsection
