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


        {!! Form::model($data, ['method' => 'PATCH','route' => ['operational.update', $data->id]]) !!}
        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование данных ручного ввода для расчета</h2></div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Год</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('year', null, array('placeholder' => 'Укажите год','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
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
                    <h4 class="text-muted" style="text-align: left">Количество критичных несоответствий на ОПО, выявленных ПК 1-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_kp1', null, array('placeholder' => 'Укажите количество критичных несоответствий на ОПО, выявленных ПК 1-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество критичных несоответствий на ОПО, выявленных ПК 2-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_kp2', null, array('placeholder' => 'Укажите количество критичных несоответствий на ОПО, выявленных ПК 2-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество критичных несоответствий на ОПО, выявленных ПК 3-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_kp3', null, array('placeholder' => 'Укажите количество критичных несоответствий на ОПО, выявленных ПК 3-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество критичных несоответствий на ОПО, выявленных ПК 4-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_kp4', null, array('placeholder' => 'Укажите количество критичных несоответствий на ОПО, выявленных ПК 4-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель наличия "критичных" несоответствий на ОПО уровни 1-2</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kp1', null, array('placeholder' => 'Укажите показатель наличия "критичных" несоответствий на ОПО уровни 1-2','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель наличия "критичных" несоответствий на ОПО уровни 2-3</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kp2', null, array('placeholder' => 'Укажите показатель наличия "критичных" несоответствий на ОПО уровни 2-3','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель наличия "критичных" несоответствий на ОПО уровни 3-4</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kp3', null, array('placeholder' => 'Укажите показатель наличия "критичных" несоответствий на ОПО уровни 3-4','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель наличия "критичных" несоответствий на ОПО и своевременности принятия мер по их устранению</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kr', null, array('placeholder' => 'Укажите показатель наличия "критичных" несоответствий на ОПО и своевременности принятия мер по их устранению','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>



        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество нарушений, устраненных в срок</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_ust', null, array('placeholder' => 'Укажите количество нарушений, устраненных в срок','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество нарушений с истекшим сроком устранения</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_ist', null, array('placeholder' => 'Укажите количество нарушений с истекшим сроком устранения','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель устраняемости нарушений Pун</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_un', null, array('placeholder' => 'Укажите показатель устраняемости нарушений Pун','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество проверяемых требований для ОПО при ПК 1 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_k1', null, array('placeholder' => 'Укажите количество проверяемых требований для ОПО при ПК 1 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество проверяемых требований для ОПО при ПК 2 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_k2', null, array('placeholder' => 'Укажите количество проверяемых требований для ОПО при ПК 2 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество проверяемых требований для ОПО при ПК 3 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_k3', null, array('placeholder' => 'Укажите количество проверяемых требований для ОПО при ПК 3 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество выявленных несоответствий требований ПБ при ПК 2 ур. и не выявленных при ПК 1 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk2_1', null, array('placeholder' => 'Укажите количество выявленных несоответствий требований ПБ при ПК 2 ур. и не выявленных при ПК 1 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество выявленных несоответствий требований ПБ при ПК 3 ур. и не выявленных при ПК 2 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk3_2', null, array('placeholder' => 'Укажите количество выявленных несоответствий требований ПБ при ПК 3 ур. и не выявленных при ПК 2 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество выявленных несоответствий требований ПБ при ПК 4 ур. и не выявленных при ПК 3 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk4_3', null, array('placeholder' => 'Укажите количество выявленных несоответствий требований ПБ при ПК 4 ур. и не выявленных при ПК 3 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель результативности контрольных процедур 1 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_cproc1', null, array('placeholder' => 'Укажите показатель результативности контрольных процедур 1 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель результативности контрольных процедур 2 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_cproc2', null, array('placeholder' => 'Укажите показатель результативности контрольных процедур 2 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель результативности контрольных процедур 3 уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_cproc3', null, array('placeholder' => 'Укажите показатель результативности контрольных процедур 3 уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель результативности контрольных процедур (итоговый)</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kp', null, array('placeholder' => 'Укажите показатель результативности контрольных процедур (итоговый)','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество несоответствий на ОПО, выявленных ПК 1-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk1', null, array('placeholder' => 'Укажите количество несоответствий на ОПО, выявленных ПК 1-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество несоответствий на ОПО, выявленных ПК 2-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk2', null, array('placeholder' => 'Укажите количество несоответствий на ОПО, выявленных ПК 2-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество несоответствий на ОПО, выявленных ПК 3-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk3', null, array('placeholder' => 'Укажите количество несоответствий на ОПО, выявленных ПК 3-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество несоответствий на ОПО, выявленных ПК 4-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_pk4', null, array('placeholder' => 'Укажите количество несоответствий на ОПО, выявленных ПК 4-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество повторно выявленных несоответствий на ОПО ПК 1-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_rep1', null, array('placeholder' => 'Укажите количество повторно выявленных несоответствий на ОПО ПК 1-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество повторно выявленных несоответствий на ОПО ПК 2-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_rep2', null, array('placeholder' => 'Укажите количество повторно выявленных несоответствий на ОПО ПК 2-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество повторно выявленных несоответствий на ОПО ПК 3-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_rep3', null, array('placeholder' => 'Укажите количество повторно выявленных несоответствий на ОПО ПК 3-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество повторно выявленных несоответствий на ОПО ПК 4-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_rep4', null, array('placeholder' => 'Укажите количество повторно выявленных несоответствий на ОПО ПК 4-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель повторно выявляемых несоответствий 1-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_pn1', null, array('placeholder' => 'Укажите показатель повторно выявляемых несоответствий 1-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель повторно выявляемых несоответствий 2-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_pn2', null, array('placeholder' => 'Укажите показатель повторно выявляемых несоответствий 2-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель повторно выявляемых несоответствий 3-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_pn3', null, array('placeholder' => 'Укажите показатель повторно выявляемых несоответствий 3-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель повторно выявляемых несоответствий 4-го уровня</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_pn4', null, array('placeholder' => 'Укажите показатель повторно выявляемых несоответствий 4-го уровня','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель повторно выявляемых несоответствий (итоговый) Pпн</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_pn', null, array('placeholder' => 'Укажите показатель повторно выявляемых несоответствий (итоговый) Pпн','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель эффективности корректирующих и предупреждающих действий</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kd', null, array('placeholder' => 'Укажите показатель эффективности корректирующих и предупреждающих действий','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель эффективности корректирующих и предупреждающих действий на 2 ур. ПК</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kd2', null, array('placeholder' => 'Укажите показатель эффективности корректирующих и предупреждающих действий на 2 ур. ПК','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель эффективности корректирующих и предупреждающих действий на 3 ур. ПК</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_kd3', null, array('placeholder' => 'Укажите показатель эффективности корректирующих и предупреждающих действий на 3 ур. ПК','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество несоответствий на ОПО, выявленных по результатам проверок Ростехнадзора</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_rtn', null, array('placeholder' => 'Укажите количество несоответствий на ОПО, выявленных по результатам проверок Ростехнадзора','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Количество несоответствий на ОПО, выявленных по результатам проверок корпоративного контроля ПАО Газпром</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('n_kk', null, array('placeholder' => 'Укажите количество несоответствий на ОПО, выявленных по результатам проверок корпоративного контроля ПАО Газпром','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Средний показатель тяжести возможных последствий на 1 объект проверки (ПК)</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('s_pk', null, array('placeholder' => 'Укажите средний показатель тяжести возможных последствий на 1 объект проверки (ПК)','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Средний показатель тяжести возможных последствий на 1 объект проверки (КК)</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('s_kk', null, array('placeholder' => 'Укажите средний показатель тяжести возможных последствий на 1 объект проверки (КК)','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Средний показатель тяжести возможных последствий на 1 объект проверки (РТН)</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('s_rtn', null, array('placeholder' => 'Укажите средний показатель тяжести возможных последствий на 1 объект проверки (РТН)','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель результативности производственного контроля организации, эксплуатирующей ОПО</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_vp', null, array('placeholder' => 'Укажите показатель результативности производственного контроля организации, эксплуатирующей ОПО','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">
            <div class="row justify-content-start">
                <div class="col">
                    <h4 class="text-muted" style="text-align: left">Показатель охвата элементов ОПО контрольными процедурами</h4>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::text('p_ok', null, array('placeholder' => 'Укажите показатель охвата элементов ОПО контрольными процедурами','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>



        <div style="padding-bottom: 40px; margin-top: 20px"
             class="text-center">
            <button type="submit" class="btn btn-outline-success">Сохранить
            </button>
            <a href={{"/opo/".$data->from_opo."/main"}}>
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
