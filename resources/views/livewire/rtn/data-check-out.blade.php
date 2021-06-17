<div style="display: inline-block; width: 10%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r51" name="tab_group">
        <label for="r51" class="tab_title razd_col_tab">Раздел 5.1</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan51">
                    <table>
                        <thead>
                        <tr>
                            <th rowspan="3" class="centered">Структурное подразделение</th>
                            <th rowspan="3" class="centered">Регистрационный номер ОПО</th>
                            <th rowspan="3" class="centered">Дата проведения проверки</th>
                            <th rowspan="2" colspan="3" class="centered">Лицо, ответственное за проведение проверки</th>
                            <th rowspan="3" class="centered">Приостановлено работ по результатам проверок производственного контроля</th>
                            <th colspan="10" class="centered">Нарушения</th>
                            <th rowspan="3" class="centered">Предложения, внесенные службой производственного контроля руководству предприятий по обеспечению промышленной безопасности</th>
                            <th rowspan="3" class="centered"></th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="centered">Характер нарушения</th>
                            <th colspan="2" class="centered">Нарушенные нормативные документы и их пункты</th>
                            <th colspan="6" class="centered">Мероприятия по устранению нарушения</th>
                            <th rowspan="2" class="centered">Работники, привлеченные к ответственности</th>
                        </tr>
                        <tr>
                            <th class="centered">Фамилия</th>
                            <th class="centered">Имя</th>
                            <th class="centered">Отчество</th>
                            <th class="centered">Нормативный правовой акт</th>
                            <th class="centered">Пункт нормативного правового акта</th>
                            <th class="centered">Содержание мероприятия</th>
                            <th class="centered">Срок устранения нарушения</th>
                            <th class="centered">Дата устранения нарушения</th>
                            <th class="centered">Причины невыполнения в срок</th>
                            <th class="centered">Перенос срока</th>
                            <th class="centered">Основание переноса срока</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->depart_do}}</td>
                                <td>{{$row->reg_num_opo}}</td>
                                <td>{{$row->date_check_out}}</td>
                                <td>{{$row->name_f}}</td>
                                <td>{{$row->name_l}}</td>
                                <td>{{$row->name_p}}</td>
                                <td>{{$row->stop_work}}</td>
                                <td>{{$row->char_violation}}</td>
                                <td>{{$row->norm_act}}</td>
                                <td>{{$row->point_act}}</td>
                                <td>{{$row->name_event}}</td>
                                <td>{{$row->time_violation}}</td>
                                <td>{{$row->date_violation}}</td>
                                <td>{{$row->reasons_nonperf}}</td>
                                <td>{{$row->data_reasons}}</td>
                                <td>{{$row->reasons_post}}</td>
                                <td>{{$row->worker_violation}}</td>
                                <td>{{$row->offers_spb}}</td>
                                <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal51"><img wire:click="edit({{$row->id}})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
    <div id="openModal51" class="modal">
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
                                <td>Структурное подразделение</td>
                                <td><input type="text" wire:model="depart_do" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Регистрационный номер ОПО</td>
                                <td><input text wire:model="reg_num_opo" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата проведения проверки</td>
                                <td><input text wire:model="date_check_out" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Фамилия.  Лицо, ответственное за проведение проверки</td>
                                <td><input text wire:model="name_f" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Имя. Лицо, ответственное за проведение проверки</td>
                                <td><input text wire:model="name_l" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Отчество. Лицо, ответственное за проведение проверки</td>
                                <td><input text wire:model="name_p" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Приостановлено работ по результатам проверок производственного контроля</td>
                                <td><input text wire:model="stop_work" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Характер нарушения</td>
                                <td><input text wire:model="char_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Нормативный правовой акт</td>
                                <td><input text wire:model="norm_act" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Пункт нормативного правового акта</td>
                                <td><input text wire:model="point_act" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Содержание мероприятия</td>
                                <td><input text wire:model="name_event" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Срок устранения нарушения</td>
                                <td><input text wire:model="time_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата устранения нарушения</td>
                                <td><input text wire:model="date_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Причины невыполнения в срок</td>
                                <td><input text wire:model="reasons_nonperf" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Перенос срока</td>
                                <td><input text wire:model="data_reasons" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Основание переноса срока</td>
                                <td><input text wire:model="reasons_post" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Работники, привлеченные к ответственности</td>
                                <td><input text wire:model="worker_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Предложения, внесенные службой производственного контроля руководству предприятий по обеспечению промышленной безопасности</td>
                                <td><input text wire:model="offers_spb" id="title" style="min-width: 350px" /></td>
                            </tr>

                            <td colspan="2" class="link_td centered"><button type="submit" class="create" wire:click.prevent="update()">
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


