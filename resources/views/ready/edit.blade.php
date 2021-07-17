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


        {!! Form::model($data, ['method' => 'PATCH','route' => ['ready.update', $data->id]]) !!}
        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование данных ручного ввода для расчета</h2></div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Год</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('year', null, array('placeholder' => 'Укажите год','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                        <input type="hidden" name="from_opo" value="{{ $ver_opo->idOPO }}">
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
                    <h4 class="text-muted" style="text-align: left">Количество проведенных учебных тревог по ПМЛА с персоналом ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_prut', null, array('placeholder' => 'Укажите количество проведенных учебных тревог по ПМЛА с персоналом ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество запланированных учебных тревог по ПМЛА с персоналом ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_ut', null, array('placeholder' => 'Укажите количество запланированных учебных тревог по ПМЛА с персоналом ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество действующих ПМЛА на ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_opmla', null, array('placeholder' => 'Укажите количество действующих ПМЛА на ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Общее количество необходимых ПМЛА на ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_pmla', null, array('placeholder' => 'Укажите общее количество необходимых ПМЛА на ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество ОПО, обслуживаемых АСФ</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_oasf', null, array('placeholder' => 'Укажите количество ОПО, обслуживаемых АСФ','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество ОПО, подлежащих обслуживанию АСФ</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_asf', null, array('placeholder' => 'Укажите количество ОПО, подлежащих обслуживанию АСФ','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Имеется резерв финансовых средств (1 - да, 0 - нет)</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_gfs', null, array('placeholder' => 'Укажите имеется ли резерв финансовых средств (1 - да, 0 - нет)','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Фактически имеющийся аварийный запас в соответствии с перечнем номенклатуры</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_f_em_stock', null, array('placeholder' => 'Укажите фактически имеющийся аварийный запас в соответствии с перечнем номенклатуры','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>



        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Плановый аварийный запас в соответствии с перечнем номенклатуры</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_em_stock', null, array('placeholder' => 'Укажите плановый аварийный запас в соответствии с перечнем номенклатуры','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Фактическая численность работников организации, занятых на ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_f_staff', null, array('placeholder' => 'Укажите фактическую численность работников организации, занятых на ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Штатная численность работников организации, занятых на ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_staff', null, array('placeholder' => 'Укажите штатную численность работников организации, занятых на ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Фактическая численность работников организации, занятых на ОПО и аттестованных на ПБ</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_f_att', null, array('placeholder' => 'Укажите фактическую численность работников организации, занятых на ОПО и аттестованных на ПБ','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Штатная численность работников организации, занятых на ОПО и подлежащих аттестации на ПБ</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('q_att', null, array('placeholder' => 'Укажите штатную численность работников организации, занятых на ОПО и подлежащих аттестации на ПБ','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
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
