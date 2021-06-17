@extends('web.layouts.app')


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


                        {!! Form::model($data, ['method' => 'PATCH','route' => ['form62.update', $data->id]]) !!}
                    <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание "Акта
                            технического расследования причин <br/>  аварии на опасном
                            производственном объекте, гидротехническом сооружении "</h2></div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col"><h4 class="text-muted" style="text-align: left">Дата и время (московское)
                                    аварии</h4>
                            </div>
                            <div class="col">
                                {!! Form::text('date_accident', null, array('placeholder' => 'Введите дату и время аварии','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'id'=>'from')) !!}
                                </select></div>
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Реквизиты организаци</h4>
                        <div class="form-group">
                            {!! Form::textarea('info_organisation', null, array('placeholder' => 'Укажите название организации, ее организационно-правовая  форму, форму собственности, адрес в пределах места нахождения,  ФИО и контактные данные  руководителя  организации','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Состав комиссии технического расследования причин аварии:</h4>
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
                                            {!! Form::text('predsed', null, array('placeholder' => 'ФИО председателя','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('data_predsed', null, array('placeholder' => 'Занимаемая должность','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
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
{{--                        </table>--}}
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Характеристика организации (объекта, участка) и места аварии:</h4>
                        <div class="form-group">
                            {!! Form::textarea('char_organisation', null, array('placeholder' => 'Укажите данные о регистрационном номере объекта, наличии   договора  страхования  риска  ответственности  за  причинение вреда при эксплуатации объекта, проектных данных и соответствиях проекту и др.','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Информация о квалификации работников:</h4>
                        <div class="form-group">
                            {!! Form::textarea('info_worker', null, array('placeholder' => 'Укажите данные о квалификации работников','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Обстоятельства    аварии,    допущенные    нарушения   требований законодательства:</h4>
                        <div class="form-group">
                            {!! Form::textarea('info_acccident', null, array('placeholder' => 'Укажите данные об обстоятельствах аварии','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Причины аварии:</h4>
                        <td class="table table-bordered">
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Технические причины аварии -</h5>
                                <div class="form-group">
                                    {!! Form::textarea('tech_reason', null, array('placeholder' => 'Укажите технические причины аварии','style' => 'height: 8vh; width: 70%')) !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Организационные причины аварии -</h5>
                                <div class="form-group">
                                    {!! Form::textarea('organisation_reason', null, array('placeholder' => 'Укажите организационные причины аварии','style' => 'height: 8vh; width: 70%')) !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Прочие причины аварии -</h5>
                                <div class="form-group">
                                    {!! Form::textarea('other_reason', null, array('placeholder' => 'Укажите прочие причины аварии','style' => 'height: 8vh; width: 70%')) !!}
                                </div>
                            </div>
                        </td>
{{--                        </table>--}}
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Мероприятия по локализации и устранению причин аварии:</h4>
                        <div class="form-group">
                            {!! Form::textarea('event', null, array('placeholder' => 'Введите описание мероприятий','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Заключение о лицах, ответственных за допущенные нарушения требований безопасности:</h4>
                        <div class="form-group">
                            {!! Form::textarea('result', null, array('placeholder' => 'Введите информацию о лицах,ответственных за допущенные нарушения требований безопасности','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Последствия от аварии:</h4>
                        <div class="form-group">
                            {!! Form::textarea('result_acccident', null, array('placeholder' => 'Укажите повреждения технических устройств, зданий и сооружений, расходы на ликвидацию последствий аварии на момент расследования, прямые потери и др.','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col"><h4 class="text-muted" style="text-align: left">Дата проведения расследования:</h4>
                            </div>
                            <div class="col">
                                {!! Form::text('act_date', null, array('placeholder' => 'Введите дату проведения расследования','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'id'=>'to')) !!}
                                </select></div>
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Приложения:</h4>
                        <div class="form-group">
                            {!! Form::textarea('description', null, array('placeholder' => 'Укажите информацию о материалах расследования аварии','style' => 'height: 8vh; width: 70%')) !!}
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

    @include('web.include.modal.datapicker')
@endsection
