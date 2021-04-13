@extends('layout.app')
@section('title')
    ОПО  {{$opo}}
@endsection
@section('content')
        @php
         $id_opo = App\Http\Controllers\OpoController::id_opo_from_name($opo);
         $ip_opo = App\Http\Controllers\OpoController::calc_elem(199);
         echo $ip_opo;
        @endphp
    <h1>Страница Ситационного плана {{$opo}} </h1>
    <div class="chart">
        <div id="container">
            <div id="Navigator_opo">
{{--                <button class="OPO_nav" onclick="window.location.href = '/opo_plan/{{$opo}}';"> Ситуационный план--}}
{{--                </button>--}}
{{--                <button class="OPO_nav" onclick="window.location.href = '/opo/{{$opo}}';"> Общие сведения</button>--}}
{{--                <button class="OPO_nav"> Показатель Эффективности производственного контроля</button>--}}
{{--                <button class="OPO_nav"> Документация</button>--}}
            </div>
        </div>
    </div>
@endsection
