@extends('web.layouts.app')
@section('title')
    Журнал аварийных сообщений
@endsection

@section('content')

            @include('web.include.sidebar_opo')


    <div class="top_table full_table">
        <div class="table_head_block">
            <img alt="" src="{{asset('assets/images/t_left.svg')}}" class="table_left_corner">
            <table>
                <tbody>
                <tr>
                    <td class="td_ch"></td>
                    <td class="td_date ps_el">Дата</td>
                    <td class="td_status ps_el">Статус</td>
                    <td class="td_opo ps_el">ОПО</td>
                    <td class="td_element ps_el">Элемент ОПО</td>
                    <td class="td_number ps_el">Номер</td>
                    <td class="td_event ps_el">Событие</td>
                    <td class=""></td>
                    <td class="td_btn activated"><a href="{{asset('/opo/1')}}">Закрыть журнал</a></td>

                </tr>
                </tbody>
            </table>
            <div class="table_filter">
                <div>Выбрать период</div>
                <div>Класс события</div>
                <div>Сортировать по</div>
            </div>
        </div>
        <div class="top_table_inside full_table">
            <div class="tabs razd_col_tab no_border">
                <div class="no_tab_table opend">
                    <table class="plan_table norm_tabl">
                        <tbody>
                        @foreach ($jas as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td class="td_date">{{date('d-m-Y h:m', strtotime($value->data))}}</td>
                                <td class="td_status">{{$value->level}}</td>
                                <td class="td_opo">{{$value->jas_to_opo->descOPO}}</td>
                                <td class="td_element">{{$value->jas_to_elem->nameObj}} (Элемен объекта ОПО {{$value->jas_to_opo->descOPO}})</td>
                                <td class="td_number">{{$value->status}}</td>
                                <td class="td_event">{{$value->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="table_use">
                        <table>
                            <tbody>
                            <tr>
                                <td><p>Всего записей:{{$jas->count()}}</p></td>

                            </tr>
                            </tbody>
                            {!! $jas->links() !!}

                        </table>


                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
