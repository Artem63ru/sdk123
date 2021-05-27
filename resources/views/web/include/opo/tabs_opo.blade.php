<div class="tabs">
   <div class="tab two_col_tab">
        <input type="radio" id="opo_info" name="tab_group" checked>
        <label for="opo_info" class="tab_title">Общие сведения ОПО</label>
        <section class="tab_content not_white">
            <div class="inside_tab_padding not_white">

                <div class="func_passport_top">

                    <table class="opo_info">
                        <tbody>
                        <tr>
                            <td>Наименование ОПО:</td>
                            <td>{{$ver_opo->descOPO}}</td>
                        </tr>
                        <tr>
                            <td>Полное наименование ОПО:</td>
                            <td>{{$ver_opo->fullDescOPO}}</td>
                        </tr>
                        <tr>
                            <td>Класс опасности:</td>
                            <td>{{$ver_opo->classHazard}}</td>
                        </tr>
                        <tr class="padding_tabl">
                            <td>Регистрационный номер ОПО:</td>
                            <td>{{$ver_opo->regNumOPO}}</td>
                        </tr>
                        <tr>
                            <td>Дата регистрации:</td>
                            <td>{{$ver_opo->dateReg}}</td>
                        </tr>
                        <tr>
                            <td>Статус:</td>
                            <td>{{$ver_opo->flDel}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <style>
                    #chartdiv {
                        width: 90%;
                        height: 120%;
                    }
                </style>

                <div class="func_passport_bottom tabled_rate">
                    <table>
                        <tbody>
                        <tr>
                            <td class="inntegral">
                                <div class="replace div2" id="chartdiv" >
                                    @include('charts.chart_1')
                                </div>
                            </td>
                            <td class="rating"><div class="div1"><h3 class="red">4</h3> <p>Количество предписаний<br/>Ростехнадзора</p>
                                    <img alt="" src="{{asset('replace/rate1.png')}}" class="replace"></div></td>
                            <td class="rating"><div class="div1"><h3 class="blue">95%</h3> <p>Оценка эффективности<br/>проведения ПБ</p>
                                    <img alt="" src="{{asset('replace/rate2.png')}}" class="replace"></div></td>
                            <td class="rating"><div class="div1"><h3 class="green">2</h3> <p>Общее количество<br/>событий ПБ</p>
                                    <img alt="" src="{{asset('replace/rate3.png')}}" class="replace"></div></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>


    <div class="tab two_col_tab">
        <input type="radio" id="pk_rate" name="tab_group">
        <label for="pk_rate" class="tab_title">Оценка проведения ПК</label>
        <section class="tab_content">
            <div class="inside_tab_padding">
                <div class="tech_passport_tab rate_page">





                    <div class="tabs-container">
                        <ul class="tabs">
                            <li class="active"><a href="">Оценка эффективности</a></li>
                            <li><a href="">Показатель безопасности ОПО</a></li>
                            <li><a href="">Показатель безаварийности ОПО</a></li>
                            <li><a href="">Показатель готовности организации ОПО</a></li>
                        </ul>
                        <div class="tabs-content">
                            <div class="tabs-panel active" data-index="0">
                                <h4>Расчет оценки эффективности ПК </h4>
                                @include('charts.effect_apk.Performance_apk')
                                <div class="inform">
                                    <div class="inform_left">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Процесс эффективен</td><td>Больше 0,9</td></tr>
                                            <tr><td>Область перспективного развития ПК</td><td>От 0,7 до 0,9</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="inform_right">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Область улучшения</td><td>От 0,5 до 0,7</td></tr>
                                            <tr><td>Требуется разработка и реализация <br/>корректирующих действий</td><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-panel" data-index="1">
                                <h4>Расчет показателя безопасности ОПО</h4>
                                @include('charts.effect_apk.safety_indicator')
                                <div class="inform">
                                    <div class="inform_left">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Процесс эффективен</td><td>Больше 0,9</td></tr>
                                            <tr><td>Область перспективного развития ПК</td><td>От 0,7 до 0,9</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="inform_right">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Область улучшения</td><td>От 0,5 до 0,7</td></tr>
                                            <tr><td>Требуется разработка и реализация <br/>корректирующих действий</td><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-panel" data-index="2">
                                <h4>Расчет показателя безаварийности ОПО</h4>
                                @include('charts.effect_apk.Accident-free_indicator')
                                <div class="inform">
                                    <div class="inform_left">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Процесс эффективен</td><td>Больше 0,9</td></tr>
                                            <tr><td>Область перспективного развития ПК</td><td>От 0,7 до 0,9</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="inform_right">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Область улучшения</td><td>От 0,5 до 0,7</td></tr>
                                            <tr><td>Требуется разработка и реализация <br/>корректирующих действий</td><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-panel" data-index="3">
                                <h4>Расчет показателя готовности организации и персонала ОПО к локализации аварий и инцидентов</h4>
                                @include('charts.effect_apk.Readiness_indicator')
                                <div class="inform">
                                    <div class="inform_left">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Процесс эффективен</td><td>Больше 0,9</td></tr>
                                            <tr><td>Область перспективного развития ПК</td><td>От 0,7 до 0,9</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="inform_right">
                                        <table class="opo_info">
                                            <tbody>
                                            <tr><td>Область улучшения</td><td>От 0,5 до 0,7</td></tr>
                                            <tr><td>Требуется разработка и реализация <br/>корректирующих действий</td><td></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             </div>

            </div>
        </section>
    </div>

</div>








