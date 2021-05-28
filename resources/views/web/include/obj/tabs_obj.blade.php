<div class="opo_grid">
    <div class="opo_left">
        <div class="opo_block">


            <div class="tabs opo_tabs">
                <div class="tab two_col_tab">
                    <input type="radio" id="main_opo" name="tab_group" checked>
                    <label for="main_opo" class="tab_title">Основные сведения по элементу ОПО</label>
                    <section class="tab_content">
                        <div class="inside_tab_padding">
                            <div class="tech_passport_tab">

                                <a href="#"><img alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="edit_icon"></a>

                                <table class="noborders">
                                    <thead>
                                    <tr>
                                        <th>Наименование элемента ОПО</th>
                                        <th>Статус</th>
                                        <th>Тип проекта</th>
                                        <th>Тип объекта</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
{{--                                        {{$this_elem->elem_to_calc_40}}--}}
                                        <td>{{$this_elem->nameObj}}</td>
                                        <td class="good"><span>{{$this_elem->obj_to_status->desc_work}}</span></td>
                                        <td>Маннесманн</td>
                                        <td>{{$this_elem->obj_to_type->type_name}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </section>
                </div>


                <div class="tab two_col_tab">
                    <input type="radio" id="opo_pass" name="tab_group">
                    <label for="opo_pass" class="tab_title">Функциональный паспорт элемента ОПО</label>
                    <section class="tab_content">
                        <div class="inside_tab_padding">
                            <div class="tech_passport_tab opo">
                                <h4>Перечень контролируемых технологичных параметров по объекту ОПО</h4>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>АСУ ТП</th>
                                        <th>Наименование параметра</th>
                                        <th>Мин.</th>
                                        <th>Макс.</th>
                                        <th>Коэф-Нт</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reglaments as $reglament)
                                    <tr>
                                        <td>{{$reglament->reglament_to_param->asutp_name}}</td>
                                        <td>{{$reglament->reglament_to_param->full_name}}</td>
                                        <td>{{$reglament->min}}</td>
                                        <td>{{$reglament->max}}</td>
                                        <td>{{$reglament->koef}}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </section>
                </div>



            </div>





        </div>

        <div class="period_block opo_period">

            <div class="func_passport_bottom">
                <h4>Перечень несоответствий производственного контроля</h4>
                <div class="ppr_date_single">Всего несоответствий <span>{{$this_elem->elem_to_APK->count()}}</span></div>
                <table>
                    <thead>
                    <tr>
                        <th>Несоответствия</th>
                        <th>Документ</th>
                        <th>Дата</th>
                        <th>Коэф-нт</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($this_elem->elem_to_APK as $apk)
                    <tr>
                        <td>{{$apk->Details}}</td>
                        <td>{{$apk->Document}} </td>
                        <td>{{$apk->CompleteDate}}</td>
                        <td>{{$apk->Weight}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>



        </div>
    </div>

    <div class="opo_right">
        <div class="opo_squares">
            <div class="opo_page_square" id = "1">

                    <style>
                        #chartdiv, #chartdiv1, #chartdiv2, #chartdiv3 {
                            width: 100%;
                            height: 150px;
                            margin-top: -10px;
                        }
                    </style>
                    <div id="chartdiv"></div>
                    @include('charts.elem_main_charts.chart_1')
                <p style="margin-top: -23px">Интегральный показатель <br/>состояния ПБ</p>
            </div>
            <div class="opo_page_square" id = "2"><a href="#">
                    <div id="chartdiv1"></div>
                    @include('charts.elem_main_charts.chart_2')
                    <p style="margin-top: -23px"> Обобщенный показатель <br/>по комплексным сценариям</p></a></div>
            <div class="opo_page_square" id = "3"><a href="#">
                <div id="chartdiv2"></div>
                @include('charts.elem_main_charts.chart_3')
                    <p style="margin-top: -23px">Обобщенный показатель <br/>регламентных значений</p></a></div>
            <div class="opo_page_square" id = "4"><a href="#">
                    <div id="chartdiv3"></div>
                    @include('charts.elem_main_charts.chart_4')
                    <p style="margin-top: -23px"> Обобщенный показатель <br/>регламентных значений</p></a></div>
        </div>

        <div class="period_info inside_type">
            @include('charts.elem_main_charts.chart_elem_all')
        </div>
    </div>


</div>
