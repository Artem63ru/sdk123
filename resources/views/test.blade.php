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


                    {!! Form::model($data, ['method' => 'PATCH','route' => ['testvideo.update', $data->id]]) !!}

                    <div class="card-header">

                        <table class="table table-bordered">

                            <div class="card-header"><h4 class="text-muted" style="text-align: left">eal003_xh01</h4>
                                <div class="form-group">
                                    {!! Form::textarea('eal003_xh01', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">zlc004_xb21</h4>
                                <div class="form-group">
                                    {!! Form::textarea('zlc004_xb21', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">aah001_xp03</h4>
                                <div class="form-group">
                                    {!! Form::textarea('aah001_xp03', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">tah009_xk03</h4>
                                <div class="form-group">
                                    {!! Form::textarea('tah009_xk03', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">fal001_xp01</h4>
                                <div class="form-group">
                                    {!! Form::textarea('fal001_xp01', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">pal012_xp01</h4>
                                <div class="form-group">
                                    {!! Form::textarea('pal012_xp01', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">pal035_xh01</h4>
                                <div class="form-group">
                                    {!! Form::textarea('pal035_xh01', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-header"><h4 class="text-muted" style="text-align: left">pal003_xh01</h4>
                                <div class="form-group">
                                    {!! Form::textarea('pal003_xh01', null, array('placeholder' => 'Введите пострадавших','style' => 'height: 1vh; width: 20%', 'class' => 'form-control')) !!}
                                </div>
                            </div>

                        </table>
                    </div>

                    <div style="padding-bottom: 40px" class="col-xs-12 col-sm-12 col-md-12 text-center">
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
