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

                    {!! Form::model($data, ['method' => 'PATCH','route' => ['form61.update', $data->id]]) !!}

                    <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание "Оперативного
                            сообщения об аварии, <br/> случае утраты взрывчатых материалов промышленного назначения"</h2></div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Вид аварии:</h4>

                        <table class="table table-bordered">

                            <tr>
                                <label class="h5 text-muted" >{{ Form::checkbox('vid_1', 1) }}
                                    - неконтроллируемый взрыв</label>

                            </tr>
                            <tr>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_2', 1) }}
                                    - выброс опасных веществ</label>

                            </tr>
                            <tr>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_3', 1) }}
                                    - разрушение сооружений</label>

                            </tr>
                            <tr>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_4', 1) }}
                                    - разрушение технических устройств</label>

                            </tr>
                            <tr>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_5', 1) }}
                                    - авария гидротехнического сооружения</label>

                            </tr>
                            <tr>
                                <label class="h5 text-muted">{{ Form::checkbox('vid_6', 1) }}
                                    - утрата взрывчатых материалов промышленного назначения</label>

                            </tr>
                        </table>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Наличие пострадавших</h4>
                        <div class="form-group">
                            {!! Form::textarea('victim', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col"><h4 class="text-muted" style="text-align: left">Дата и время (московское) аварии,   утраты   взрывчатых   материалов
                                    промышленного назначения</h4>
                            </div>
                            <div class="col">
                                {!! Form::text('date', null, array('placeholder' => 'Введите дату и время','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'id'=>'from')) !!}
                                </select></div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">

                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Территориальный орган, вид надзора</h4>
                            </div>
                            <div class="col">
                                {!! Form::select('supervision', array('РТН' => 'Ростехнадзор', 'ГН' => 'Газнадзор'), null, ['style' => 'width: 70%']) !!}

                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Наименование организации</h4>
                            </div>
                            <div class="col">
                                {!! Form::select('name_organisation', array('ГДА' => 'ООО Газпром Добыча Астрахань'), null, ['style' => 'width: 70%']) !!}
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
                                    {!! Form::textarea('adress', null, array('placeholder' => 'Введите адрес','style' => 'height: 6vh; width: 70%')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Место аварии,   утраты   взрывчатых  материалов  промышленного  назначения
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::textarea('place', null, array('placeholder' => 'Укажите производство, участок, цех, координаты по трассе с привязкой к  ближайшему населенному пункту','style' => 'height: 6vh; width: 70%')) !!}
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
                                    {!! Form::text('num_obj', null, array('placeholder' => 'Введите номер объекта','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col">
                                <h4 class="text-muted" style="text-align: left">Обстоятельства аварии,   утраты   взрывчатых    материалов  промышленного назначения и последствия (в том числе травмирование)
                                </h4>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::textarea('desc_accident', null, array('placeholder' => 'Введите обстоятельства аварии,   утраты   взрывчатых    материалов  промышленного назначения','style' => 'height: 6vh; width: 70%')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Организации, принимающие участие в  ликвидации  последствий  аварии, утраты
                            взрывчатых материалов промышленного назначения</h4>
                        <div class="form-group">
                            {!! Form::textarea('event_organisation', null, array('placeholder' => 'Введите информацию об организациях','style' => 'height: 8vh; width: 70%')) !!}
                        </div>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Информация о приеме сообщения:</h4>
                        <td class="table table-bordered">
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col">
                                        <h5 class="text-muted" style="text-align: left">Передал -
                                        </h5>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::text('passed', null, array('placeholder' => 'ФИО передавшего','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('passed_data', null, array('placeholder' => 'Должность, телефон передавшего','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col">
                                        <h5 class="text-muted" style="text-align: left">Принял -
                                        </h5>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::text('accepted', null, array('placeholder' => 'ФИО принявшего','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('accepted_data', null, array('placeholder' => 'Занимаемая принявшим должность','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col"><h5 class="text-muted" style="text-align: left">Дата и время (московское) приема</h5>
                                    </div>
                                    <div class="col">
                                        {!! Form::text('date_accept', null, array('placeholder' => 'Введите дату и время','style' => 'height: 3vh; width: 70%', 'id'=>'to', 'autocomplete'=>"off")) !!}
                                        </select></div>
                                </div>
                            </div>
                        </td>
                        </table>
                    </div>

                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Причина задержки передачи информации в установленный срок</h4>
                        <div class="form-group">
                            {!! Form::textarea('reason_delay', null, array('placeholder' => 'Укажите причину','style' => 'height: 8vh; width: 70%')) !!}
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
    @include('web.include.modal.datapicker')
</div>

@endsection
