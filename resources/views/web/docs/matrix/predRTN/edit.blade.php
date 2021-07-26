@extends('web.layouts.app')
@section('title')
    Редактирование
@endsection

@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush

    @include('web.include.sidebar_doc')

    <div class="top_table">
        @include('web.include.toptable')
    </div>

{{--<div class="inside_content">--}}
{{--    <div style="background: #f8f9fa">--}}
{{--        <div class="card-header"><h2 class="text-muted" style="text-align: center">Редактирование предписания РТН</h2></div>--}}
{{--    </div>--}}

{{--        <div class="inside_tab_padding" style="margin-right: 20px; width: 1250px">--}}

{{--            <div style="border-radius: 6px; width: 1210px" class="row_block form51">--}}
    <div class="inside_content">
        <div class="inside_tab_padding">
            <div class="row_block">
                <div style="background: #FFFFFF; height:27rem; padding: 35px; border-radius: 6px"
                     class="container">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Редактирование предписания РТН</h2></div>
                {!! Form::model($data, ['method' => 'POST','route' => ['update_RTN', $data->id]]) !!}

                <div class="card-header">
                    <div class="row justify-content-start" >
                        <div class="col"  style="width: 500px">
                            <h4 class="text-muted" style="text-align: left">Содержание предписания</h4>
                        </div>
                        <div class="col">
                            <div class="form-group" style="width: 900px">
                                {!! Form::textarea('descr', null, array('placeholder' => 'Укажите содержание предписания','style' => 'height: 3vh; width: 95%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Дата предписания</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::date('date', null, array('placeholder' => 'Укажите дату предписания','style' => 'height: 3vh; width: 70%', 'autocomplete'=>"off", 'class'=>'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Отметка о выполнении</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="checkbox" name="status" id="status_checkbox">

                                <script>
                                    function test(){
                                        var checkbox=document.getElementById('status_checkbox')
                                        if ({{$data->status}}==1) {
                                            document.getElementById('status_checkbox').checked=true;
                                            // console.log(checkbox.checked)
                                        }
                                        else{
                                            document.getElementById('status_checkbox').checked=false;
                                        }
                                    }
                                    test();
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col">
                            <h4 class="text-muted" style="text-align: left">Наименование ОПО</h4>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                    <select class="form-control" name="from_opo" id="selct_per1" style="width: 425px">
                                        @foreach($data_all as $row)
                                            @if ($data->from_opo==$row->idOPO)
                                                <option selected="selected" value={{$row->idOPO}}>{{$row->descOPO}}</option>
                                            @else
                                                <option value={{$row->idOPO}}>{{$row->descOPO}}</option>
                                            @endif

                                        @endforeach
                                    </select>

                            </div>
                        </div>
                    </div>
                </div>



                <div style="padding-bottom: 40px; margin-top: 20px"
                     class="text-center">
                    <button type="submit" class="btn btn-outline-success">Сохранить
                    </button>
                    <a href={{"/docs/predRTN"}}>
                        <button type="button" class="btn btn-outline-dark">Отменить
                        </button>
                    </a>
                </div>

            {!! Form::close() !!}

            </div>
        </div>
</div>
</div>



    @include('web.include.modal.datapicker')
@endsection
