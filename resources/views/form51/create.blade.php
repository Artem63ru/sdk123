@extends('web.layouts.app')
@section('title')
    Отчеты
@endsection

@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush



    @include('web.include.sidebar_doc')
    <style>
        label {
            display: block;
            margin-bottom: 0.5rem;
        }

    </style>
    <div style="background: #FFFFFF; overflow-y:scroll; height:53rem; padding: 20px; border-radius: 6px; margin-right: 25%"
         class="container1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{--                @include('web.admin.inc.menu')--}}
              {!! Form::open(array('route' => 'form51.store','method'=>'POST')) !!}
                    <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание "Опреативного
                            сообщения <br/> об инциденте на опасном производственном объекте"</h2></div>
                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Вид инцидента</h4>

                        <table class="table table-bordered">

                            <td>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_1', 1) }}
                                    - отказ технических устройств</label>

                            </td>
                            <td>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_2', 1) }}
                                    - повреждение технических устройств</label>

                            </td>
                            <td>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_3', 1) }}
                                    - отклонение от установленного режима технологического процесса</label>

                            </td>

                        </table>
                    </div>
                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Наличие пострадавших</h4>
                        <div class="form-group">
                            {!! Form::textarea('victim', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 8vh; width: 70%', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col"><h4 class="text-muted" style="text-align: left">Дата и время (московское)
                                    инцидента</h4>
                            </div>
                            <div class="col">
                                {!! Form::text('date', null, array('placeholder' => 'Введите дату и время','style' => 'height: 3vh; width: 70%', 'id'=>'from', 'autocomplete'=>"off", 'class' => 'form-control')) !!}
                                </select></div>
                        </div>
                    </div>
                    {{--                    <div class="card-header"><h3 class="text-muted" style="text-align: left">   <br/></h3></div>--}}
                    <div class="card-header">
                        <div class="row justify-content-start">

                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Территориальный орган, вид надзора</h4>
                            </div>
                            <div class="col">
                                {!! Form::select('supervision', array('РТН' => 'Ростехнадзор', 'ГН' => 'Газнадзор'), null, ['style' => 'width: 70%', 'class' => 'form-control']) !!}

                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Наименование организации</h4>
                            </div>
                            <div class="col">
                                {!! Form::select('organisation', array('ГДА' => 'ООО Газпром Добыча Астрахань'), null, ['style' => 'width: 70%', 'class' => 'form-control']) !!}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Адрес в пределах места нахождения
                                    организации</h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::textarea('adress', null, array('placeholder' => 'Введите адрес','style' => 'height: 6vh; width: 70%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Место инцидента (производство, участок,
                                    цех,
                                    координаты по трассе с
                                    привязкой к ближайшему населенному пункту)
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::textarea('place_accident', null, array('placeholder' => 'Введите адрес','style' => 'height: 6vh; width: 70%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Регистрационный номер объекта
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::text('num_obj', null, array('placeholder' => 'Введите номер объекта','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Обстоятельства инцидента и последствия (в том числе травмирование)
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::textarea('result_acccident', null, array('placeholder' => 'Введите обстоятельства инцидента','style' => 'height: 6vh; width: 70%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 20px; padding-bottom: 40px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>

@include('web.include.modal.datapicker')

@endsection
