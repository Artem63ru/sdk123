<div style="display: inline-block; width: 10%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r21" name="tab_group">
        <label for="r21" class="tab_title razd_col_tab">Раздел 2.1</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan21">
                    <table>
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Численность сотрудников, работающих на ОПО, успешно прошедших обучение действиям в случае возникновения аварии на ОПО</th>
                            <th>Наличие специальных стендов, тренажеров и тому подобное для тренировок по планам ликвидации аварий</th>
                            <th>Оценка готовности работников к действиям во время аварии</th>
                            <th>Наличие положения о расследовании причин инцидентов, согласованного с надзорными органами</th>
                            <th>Регистрационный номер положения о расследовании причин инцидентов, согласованного с надзорными органами</th>
                            <th>Проведено учебно-тренировочных занятий по готовности персонала к действиям в случае возникновения аварии на ОПО согласно графику</th>
                            <th>Проведено учебных тревог по готовности персонала к действиям в случае возникновения аварии на ОПО согласно графику</th>
                            <th>Запланировано в отчетном периоде учебно-тренировочных занятий по действиям персонала в случае аварий и инцидентов</th>
                            <th>Запланировано на следующий отчетный период учебно-тренировочных занятий по действиям персонала в случае аварий и инцидентов</th>
                            <th>Запланировано в отчетном периоде учебных тревог по действиям персонала в случае возникновения аварий</th>
                            <th>Запланировано на следующий отчетный период учебных тревог по действиям персонала в случае аварий</th>
                            <th>Численность работников эксплуатирующей организации, занятых на ОПО</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->reg_num_opo}}</td>
                                <td>{{$row->number_work}}</td>
                                <td>{{$row->tick_stand}}</td>
                                <td>{{$row->rating_work}}</td>
                                <td>{{$row->rating_reasons}}</td>
                                <td>{{$row->reg_num_reasons}}</td>
                                <td>{{$row->quant_lesson_work}}</td>
                                <td>{{$row->quant_lesson_alarms}}</td>
                                <td>{{$row->plan_lesson_work}}</td>
                                <td>{{$row->plan_lesson_crash}}</td>
                                <td>{{$row->plan_lesson_alarms}}</td>
                                <td>{{$row->plan_next_alarms}}</td>
                                <td>{{$row->size_works}}</td>
                                <td class="hover_links">
                                    <a href="#"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal21"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
    <div id="openModal21" class="modal">
        <div class="modal-dialog table_use" style="margin-top: 150px">
            <div class="modal-content" style="width: 1000px; height: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Редактировать</h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Регистрационный номер ОПО</td>
                                <td><input type="text" wire:model="reg_num_opo" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Численность сотрудников, работающих на ОПО, успешно прошедших обучение действиям в случае возникновения аварии на ОПО</td>
                                <td><input text wire:model="number_work" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Наличие специальных стендов, тренажеров и тому подобное для тренировок по планам ликвидации аварий</td>
                                <td><input text wire:model="tick_stand" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Оценка готовности работников к действиям во время аварии</td>
                                <td><input text wire:model="rating_work" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Наличие положения о расследовании причин инцидентов, согласованного с надзорными органами</td>
                                <td><input text wire:model="rating_reasons" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Регистрационный номер положения о расследовании причин инцидентов, согласованного с надзорными органами</td>
                                <td><input text wire:model="reg_num_reasons" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Проведено учебно-тренировочных занятий по готовности персонала к действиям в случае возникновения аварии на ОПО согласно графику</td>
                                <td><input text wire:model="quant_lesson_work" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Проведено учебных тревог по готовности персонала к действиям в случае возникновения аварии на ОПО согласно графику</td>
                                <td><input text wire:model="quant_lesson_alarms" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Запланировано в отчетном периоде учебно-тренировочных занятий по действиям персонала в случае аварий и инцидентов</td>
                                <td><input text wire:model="plan_lesson_work" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Запланировано на следующий отчетный период учебно-тренировочных занятий по действиям персонала в случае аварий и инцидентов</td>
                                <td><input text wire:model="plan_lesson_crash" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Запланировано в отчетном периоде учебных тревог по действиям персонала в случае возникновения аварий</td>
                                <td><input text wire:model="plan_lesson_alarms" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Запланировано на следующий отчетный период учебных тревог по действиям персонала в случае аварий</td>
                                <td><input text wire:model="plan_next_alarms" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Численность работников эксплуатирующей организации, занятых на ОПО</td>
                                <td><input text wire:model="size_works" id="title" style="min-width: 350px" /></td>
                            </tr>



                            <td colspan="2" class="link_td centered">
                                <button type="submit" class="create" wire:click.prevent="update()">
                                    Сохранить
                                </button></td>
                            </tbody>


                        </table>
                    </form>
                    <div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


