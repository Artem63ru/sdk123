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
                    {!! Form::open(array( route('form5363-add-table',['id'=>$id]) ,'method'=>'POST')) !!}
                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Данные о мероприятиях:</h4>
                        <td class="table table-bordered">
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col">
                                        <h5 class="text-muted" style="text-align: left">№ п/п
                                        </h5>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::text('num_event', null, array('placeholder' => 'Укажите №п/п','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                            <input type="hidden" value="{{$id}}" name="id_act">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col"><h5 class="text-muted" style="text-align: left">Дата, время события  </h5>
                                    </div>
                                    <div class="col">
                                        {!! Form::date('date', null, array('placeholder' => 'Введите дату','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                        </select></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Место события, название ОПО</h5>
                                <div class="form-group">
                                    {!! Form::textarea('place', null, array('placeholder' => 'Введите данные','style' => 'height: 8vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Дата и номер акта расследования и отчета АКП</h5>
                                <div class="form-group">
                                    {!! Form::textarea('date_act', null, array('placeholder' => 'Введите данные','style' => 'height: 8vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Мероприятие</h5>
                                <div class="form-group">
                                    {!! Form::textarea('event', null, array('placeholder' => 'Введите описание мероприятия','style' => 'height: 8vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col"><h5 class="text-muted" style="text-align: left">Срок исполнения </h5>
                                    </div>
                                    <div class="col">
                                        {!! Form::date('time_event', null, array('placeholder' => 'Введите срок исполнения','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                        </select></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <label class="h5 text-muted" style="margin-left: 25px; margin-top: 10px">
                                    {{ Form::checkbox('check_event', 1) }}
                                    - мероприятие выполнено</label>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start" style="margin-top: 10px">
                                    <div class="col"><h5 class="text-muted" style="text-align: left">Информация о ходе выполнения </h5>
                                    </div>
                                    <div class="col">
                                        {!! Form::text('info', null, array('placeholder' => 'Введите информацию о ходе выполнении','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                        </select></div>
                                </div>
                            </div>
                        </td>
                        </table>



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
