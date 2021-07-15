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


{{--                    {!! Form::model($data, ['method' => 'POST','route' => ['form52-update-table', $data->id_event]]) !!}--}}
                    {!! Form::model($data, ['method' => 'POST']) !!}

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Организационно-технические мероприятия по ликвидации <br/>
                                последствий инцидента и предупреждению подобных случаев в дальнейшем</h2></div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col">
                                    <h4 class="text-muted" style="text-align: left">№ п/п
                                    </h4>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::text('num', null, array('placeholder' => 'Укажите номер пункта','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col">
                                    <h4 class="text-muted" style="text-align: left">Содержание мероприятий
                                    </h4>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::text('context', null, array('placeholder' => 'Введите информацию о мероприятиях', 'autocomplete'=>"off",'style' => 'height: 3vh; width: 70%', 'class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col"><h4 class="text-muted" style="text-align: left">Ответственный исполнитель</h4>
                                </div>
                                <div class="col">
                                    {!! Form::text('responsible', null, array('placeholder' => 'Информация о исполнителе','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </select></div>
                            </div>
                        </div>

                        <div class="card-header"><h4 class="text-muted" style="text-align: left">Срок выполнения</h4>
                            <div class="form-group">
                                {!! Form::date('time_event', null, array('placeholder' => 'Укажите срок исполнения','style' => 'height: 8vh; width: 70%', 'class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="card-header"><h4 class="text-muted" style="text-align: left">Примечания</h4>
                            <div class="form-group">
                                {!! Form::text('note', null, array('note' => 'Укажите данные о объекте','style' => 'height: 8vh; width: 70%', 'class'=>'form-control')) !!}
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
