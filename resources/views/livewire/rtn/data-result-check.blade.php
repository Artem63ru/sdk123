<div style="display: inline-block; width: 10%;">
    <div style="width: 90%" class="tab">
    <input type="radio" id="r52" name="tab_group">
    <label for="r52" class="tab_title razd_col_tab">Раздел 5.2</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan52">
                    <table>
                        <thead>
                        <tr>
                            <th rowspan="3" class="centered">Номер предписания</th>
                            <th rowspan="3" class="centered">Дата предписания</th>
                            <th rowspan="3" class="centered">Кем выдано</th>
                            <th colspan="4" class="centered">Выявленные недостатки и нарушения</th>
                            <th colspan="4" class="centered">Мероприятия по устранению нарушения</th>
                            <th rowspan="3" class="centered">Подтрверждающий документ</th>
                            <th rowspan="3" class="centered"></th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="centered">Описание нарушения</th>
                            <th colspan="3" class="centered">Сотрудник, ответственный за устранение нарушений</th>
                            <th rowspan="2" class="centered">Описание</th>
                            <th rowspan="2" class="centered">Срок выполнения</th>
                            <th rowspan="2" class="centered">Дата выполнения</th>
                            <th rowspan="2" class="centered">Причины невыполнения в установленный срок</th>
                        </tr>
                        <tr>
                            <th class="centered">Фамилия</th>
                            <th class="centered">Имя</th>
                            <th class="centered">Отчество</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->num_order}}</td>
                                <td>{{$row->date_order}}</td>
                                <td>{{$row->name_order}}</td>
                                <td>{{$row->desc_order}}</td>
                                <td>{{$row->name_f}}</td>
                                <td>{{$row->name_l}}</td>
                                <td>{{$row->name_p}}</td>
                                <td>{{$row->desc_violation}}</td>
                                <td>{{$row->time_violation}}</td>
                                <td>{{$row->date_violation}}</td>
                                <td>{{$row->reasons_nonperf}}</td>
                                <td>{{$row->confirm_doc}}</td>

                                <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal52"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
    <div id="openModal52" class="modal">
        <div class="modal-dialog table_use" style="margin-top: 150px">
            <div class="modal-content" style="width: 850px; height: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Редактировать</h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Номер предписания</td>
                                <td><input type="text" wire:model="num_order" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата предписания</td>
                                <td><input text wire:model="date_order" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Кем выдано</td>
                                <td><input text wire:model="name_order" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Описание нарушения</td>
                                <td><input text wire:model="desc_order" id="title" style="min-width: 350px" /></td>
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
                                <td>Описание</td>
                                <td><input text wire:model="desc_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Срок выполнения</td>
                                <td><input text wire:model="time_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата выполнения</td>
                                <td><input text wire:model="date_violation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Причины невыполнения в установленный срок</td>
                                <td><input text wire:model="reasons_nonperf" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Подтверждающий документ</td>
                                <td><input text wire:model="confirm_doc" id="title" style="min-width: 350px" /></td>
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

