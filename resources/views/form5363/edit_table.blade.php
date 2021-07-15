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


{{--                    {!! Form::model($data, ['method' => 'POST','route' => ['form5363-update-table', $data->id_event]]) !!}--}}
                    {!! Form::model($data, ['method' => 'POST']) !!}

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Данные о мероприятиях</h2></div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col">
                                    <h4 class="text-muted" style="text-align: left">№ п/п
                                    </h4>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::text('num_event', null, array('placeholder' => 'Укажите номер пункта','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col">
                                    <h4 class="text-muted" style="text-align: left">Дата, время события
                                    </h4>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::date('date', null, array('placeholder' => 'Укажите дату и время', 'autocomplete'=>"off",'style' => 'height: 3vh; width: 70%', 'class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col"><h4 class="text-muted" style="text-align: left">Место события, название ОПО</h4>
                                </div>
                                <div class="col">
                                    {!! Form::text('place', null, array('placeholder' => 'Информация о исполнителе','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </select></div>
                            </div>
                        </div>

                        <div class="card-header"><h4 class="text-muted" style="text-align: left">Дата и номер акта расследования и отчета АКП</h4>
                            <div class="form-group">
                                {!! Form::text('date_act', null, array('placeholder' => 'Укажите данные','style' => 'height: 8vh; width: 70%', 'class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="card-header"><h4 class="text-muted" style="text-align: left">Мероприятия</h4>
                            <div class="form-group">
                                {!! Form::text('event', null, array('note' => 'Введите описание мероприятия','style' => 'height: 8vh; width: 70%', 'class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div>
                            <label class="h5 text-muted" style="margin-left: 25px; margin-top: 10px">
                                {{ Form::checkbox('check_event', 1) }}
                                - мероприятие выполнено</label>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start" style="margin-top: 10px">
                                <div class="col"><h5 class="text-muted" style="text-align: left">Информация о ходе выполнения </h5>
                                </div>
                                <div class="col">
                                    {!! Form::text('info', null, array('placeholder' => 'Введите информацию о ходе выполнении','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </select></div>
                            </div>
                        </div>


                        <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" name="save" value="Update_table" class="btn btn-primary">Сохранить</button>
                        </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>
    @include('web.include.modal.datapicker')
@endsection
