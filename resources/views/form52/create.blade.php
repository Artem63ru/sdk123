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
              {!! Form::open(array('route' => 'form52.store','method'=>'POST')) !!}
                    <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание "Акта
                            технического <br/> расследования причин инцидента"</h2></div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">№ Акта технического расследования причин инцидента
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::text('act_num', null, array('placeholder' => 'Укажите номер Акта','style' => 'height: 3vh; width: 70%')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Наименование структорного подразделения ООО "Газпром добыча Астрахань"
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::text('tag_unitGDA', null, array('placeholder' => 'Введите наименования структурного подразделения','style' => 'height: 3vh; width: 70%')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col"><h4 class="text-muted" style="text-align: left">Дата и время (московское)
                                                            инцидента</h4>
                            </div>
                            <div class="col">
                                {!! Form::text('date_accident', null, array('placeholder' => 'Введите дату и время','style' => 'height: 3vh; width: 70%')) !!}
                                </select></div>
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Полное наименование участка,установки, цеха, инвентарный номер, регистрационный номер ОПО, на котором произошёл инцидент</h4>
                        <div class="form-group">
                            {!! Form::textarea('name_object', null, array('placeholder' => 'Введите информацию об объекте','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Комиссия в составе:</h4>
                        <td class="table table-bordered">
                            <td>
                                <div class="card-header">
                                    <div class="row justify-content-start">
                                        <div class="col">
                                            <h5 class="text-muted" style="text-align: left">Председатель -
                                            </h5>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::text('predsed', null, array('placeholder' => 'ФИО председателя','style' => 'height: 3vh; width: 70%')) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::text('data_predsed', null, array('placeholder' => 'Занимаемая должность','style' => 'height: 3vh; width: 70%')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card-header">
                                    <div class="row justify-content-start">
                                        <div class="col">
                                            <h5 class="text-muted" style="text-align: left">Зам. председателя -
                                            </h5>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::text('zam_predsed', null, array('placeholder' => 'ФИО зам. председателя','style' => 'height: 3vh; width: 70%')) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::text('data_zam', null, array('placeholder' => 'Занимаемая должность','style' => 'height: 3vh; width: 70%')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card-header"><h5 class="text-muted" style="text-align: left">Члены комиссии:</h5>
                                    <div class="form-group">
                                        {!! Form::textarea('data_comission', null, array('placeholder' => 'Укажите ФИО и занимаемую должность членов комиссии','style' => 'height: 8vh; width: 70%')) !!}
                                    </div>
                                </div>

                            </td>
                        </table>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Краткая характеристика установки (отделения, участка), где произошел инцидент</h4>
                        <div class="form-group">
                            {!! Form::textarea('characteristic', null, array('placeholder' => 'Укажите данные о объекте','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Обстоятельства инцидента</h4>
                        <div class="form-group">
                            {!! Form::textarea('info_accident', null, array('placeholder' => 'Укажите обстоятельства инцидента и сценарий его развития','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Причины инцидента</h4>
                        <div class="form-group">
                            {!! Form::textarea('reason_accident', null, array('placeholder' => 'Укажите конкретные причины возникновения инцидента и ихх описание','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Заключение о лицах, ответственных за нарушения, которые привели к инциденту</h4>
                        <div class="form-group">
                            {!! Form::textarea('result', null, array('placeholder' => 'Укажите лица (ФИО, занимаемая должность), допустившие нарушения требований безопасности, которые привели к инциденту. Следует указать какие именно требования были нарушены','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Длительность простоя
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::text('stop_time', null, array('placeholder' => 'Укажите длительность простоя оборудования в часах','style' => 'height: 3vh; width: 70%')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Последствия от инцидента</h4>
                        <div class="form-group">
                            {!! Form::textarea('result_acccident', null, array('placeholder' => 'Укажите повреждения технических устройств, затраты на проведение работ, расходы на ликвидацию последствий, снижение добычи газа, ориентировочный ущерб, наличие пострадавших','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Наличие аналогичных случаев</h4>
                        <div class="form-group">
                            {!! Form::textarea('same_accident', null, array('placeholder' => 'Укажите были ли ранее аналогичные случаи, разрабатывались ли мероприятия по их предупреждению','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Организационно-технические мероприятия по ликвидации последствий инцидента и предупреждению подобных случаев в дальнейшем:</h4>
                        <div class="inside_tab_padding plan_new">
                            <div class="row_block plan_new plan42">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="centered">№ п/п</th>
                                        <th class="centered">Содержание мероприятий</th>
                                        <th class="centered">Ответственный исполнитель</th>
                                        <th class="centered">Срок выполнения</th>
                                        <th class="centered">Примечание</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($rows as $row)
                                        <tr>
                                            <td>{{$row->num}}</td>
                                            <td>{{$row->context}}</td>
                                            <td>{{$row->responsible}}</td>
                                            <td>{{$row->time_event}}</td>
                                            <td>{{$row->note}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <div style="padding-bottom: 40px; margin-top: 30px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a href="table/">
                            <button type="button" class="btn btn-primary">+ добавить мероприятие</button>
                        </a>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col"><h4 class="text-muted" style="text-align: left">Дата составления акта</h4>
                            </div>
                            <div class="col">
                                {!! Form::text('act_date', null, array('act_date' => 'Укажите дату составления акта','style' => 'height: 3vh; width: 70%')) !!}
                                </select></div>
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Приложение</h4>
                        <div class="form-group">
                            {!! Form::textarea('app', null, array('placeholder' => 'Укажите информацию о приложениях к акту (наименование документа и количество листов в нем)','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>


@endsection
