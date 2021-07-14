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


                    {!! Form::model($data, ['method' => 'PATCH','route' => ['form5363.update', $data->id]]) !!}

                        <div class="card-header"><h2 class="text-muted" style="text-align: center">Создание "Справки о выполнении мероприятий <br/>
                                по результатам расследования и анализа коренных причин инцидентов"</h2></div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col">
                                    <h4 class="text-muted" style="text-align: left">Название структурного подразделения
                                    </h4>
                                </div>
                                <div class="col">
                                        {!! Form::text('partGDA', null, array('placeholder' => 'Введите название подразделения','style' => 'height: 3vh; width: 70%', 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col"><h4 class="text-muted" style="text-align: left">Дата начала отчетного периода</h4>
                                </div>
                                <div class="col">
                                    {!! Form::date('date1', null, array('placeholder' => 'Введите дату','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </select></div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row justify-content-start">
                                <div class="col"><h4 class="text-muted" style="text-align: left">Дата окончания отчетного периода</h4>
                                </div>
                                <div class="col">
                                    {!! Form::date('date2', null, array('placeholder' => 'Введите дату','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                                    </select></div>
                            </div>
                        </div>

                        <div class="card-header"><h4 class="text-muted" style="text-align: left; margin-bottom: 0px">Данные о мероприятиях:</h4>

                            <div class="inside_tab_padding plan_new" style="height: 400px">
                                <div class="row_block plan_new plan42">
                                    <table style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th class="centered">№ п/п</th>
                                            <th class="centered">Дата, время события</th>
                                            <th class="centered">Место события, название ОПО</th>
                                            <th class="centered">Дата и номер акта расследования и отчета АПК</th>
                                            <th class="centered">Мероприятия</th>
                                            <th class="centered">Срок выполнения</th>
                                            <th class="centered">Выполнение</th>
                                            <th class="centered">Информация о ходе выполнения</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($rows as $row)
                                            <tr>
                                                <td>{{$row->num_event}}</td>
                                                <td>{{$row->date}}</td>
                                                <td>{{$row->place}}</td>
                                                <td>{{$row->date_act}}</td>
                                                <td>{{$row->event}}</td>
                                                <td>{{$row->time_event}}</td>
                                                <td>{{$row->check_event}}</td>
                                                <td>{{$row->info}}</td>
                                                <td  class="centered">
                                                    <a href="{{ route('form5363-change-table',$row->id_event) }}"><img  alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                                  {!! Form::open(['method' => 'POST','route' => ['form5363-delete-table', $row->id_event],'style'=>'display:inline']) !!}
                                                  <input type="image" name="picture" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i" style="width: 15px; height: 15px; margin-top:3px; margin-right: 50px" />
                                                  {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        <div style="padding-bottom: 40px; margin-top: 30px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" name="save" value="Update_childtablle" class="btn btn-primary">Добавить мероприятия</button>
                            </div>
                        </div>


                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Приложение</h5>
                                <div class="form-group">
                                    {!! Form::textarea('app', null, array('placeholder' => 'Укажите документы и материалы, подтверждающие выполнение мероприятий','style' => 'height: 8vh; width: 70%', 'class'=>'form-control')) !!}
                                </div>
                            </div>


                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col"><h5 class="text-muted" style="text-align: left">Начальник отдела промышленной безопасности (ответственный за промышленную безопасность)</h5>
                                    </div>
                                    <div class="col">
                                        {!! Form::text('namePB', null, array('placeholder' => 'ФИО начальника отдела ПБ','style' => 'height: 3vh; width: 70%', 'class'=>'form-control')) !!}
                                        </select></div>
                                </div>
                            </div>

                        <div style="padding-bottom: 40px; margin-top: 20px" class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" name="save" value="Update" class="btn btn-primary">Сохранить</button>
                        </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>
    @include('web.include.modal.datapicker')
@endsection
