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

              {!! Form::open(array( route('form52-add-table',['id'=>$id]) ,'method'=>'POST')) !!}
                    <div class="card-header"><h4 class="text-muted" style="text-align: left">Организационно-технические мероприятия по ликвидации последствий инцидента и предупреждению подобных случаев в дальнейшем:</h4>
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
                                            {!! Form::text('num', null, array('placeholder' => 'Укажите №п/п','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                            <input type="hidden" value="{{$id}}" name="id_act">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Содержание мероприятия</h5>
                                <div class="form-group">
                                    {!! Form::textarea('context', null, array('placeholder' => 'Введите описание мероприятия по ликвидации последствий инцидента и предупреждению подобных случаев в дальнейшем','style' => 'height: 8vh; width: 70%')) !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col">
                                        <h5 class="text-muted" style="text-align: left">Ответственный исполнитель
                                        </h5>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::text('responsible', null, array('placeholder' => 'Введите ФИО ответственного исполнителя','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off")) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header">
                                <div class="row justify-content-start">
                                    <div class="col"><h5 class="text-muted" style="text-align: left">Срок исполнения</h5>
                                    </div>
                                    <div class="col">
                                        {!! Form::text('time_event', null, array('placeholder' => 'Укажите дату исполнения','style' => 'height: 3vh; width: 70%', 'id'=>'to', 'autocomplete'=>"off")) !!}
                                        </select></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card-header"><h5 class="text-muted" style="text-align: left">Примечание</h5>
                                <div class="form-group">
                                    {!! Form::textarea('note', null, array('placeholder' => 'Укажите примечание','style' => 'height: 8vh; width: 70%')) !!}
                                </div>
                            </div>
                        </td>
                        </table>
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
    @include('web.include.modal.datapicker')

@endsection
