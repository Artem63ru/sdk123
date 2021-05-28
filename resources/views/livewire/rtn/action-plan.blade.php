{{--<div>--}}
    <div class="tab">
        <input type="radio" id="r11" name="tab_group" checked>
        <label for="r11" class="tab_title razd_col_tab">Раздел 1.1</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new">
                    <table>
                        <thead>
                        <tr>
                            <th rowspan="2">Регистрационный номер ОПО </th>
                            <th rowspan="2">Наименование мероприятия</th>
                            <th rowspan="2" class="centered">Срок исполнения</th>
                            <th colspan="3" class="centered">Ответственный исполнитель</th>
                            <th rowspan="2" class="centered">Дата выполнения</th>
                            <th rowspan="2" class="centered">Дата переноса</th>
                            <th rowspan="2">Основание переноса срока</th>
                            <th rowspan="2">Причина переноса срока</th>
                            <th rowspan="2">Отметка о выполнении мероприятия</th>
                            <th rowspan="2">Примечание</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="centered">Фамилия </th>
                            <th class="centered">Имя </th>
                            <th class="centered">Общество </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->reg_num_opo}}</td>
                                <td>{{$row->name_event}}</td>
                                <td>{{$row->date_perfom}}</td>
                                <td>{{$row->name_f}}</td>
                                <td>{{$row->name_l}}</td>
                                <td>{{$row->name_p}}</td>
                                <td>{{$row->date_compl}}</td>
                                <td>{{$row->date_transfer}}</td>
                                <td>{{$row->reasons_post}}</td>
                                <td>{{$row->reasons_transfer}}</td>
                                <td>{{$row->check_exe}}</td>
                                <td>{{$row->note}}</td>
                                 <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
    <div id="openModal" class="modal">
        <div class="modal-dialog table_use" style="margin-top: 150px">
            <div class="modal-content" style="width: 650px; height: 650px">
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
                                <td>Наименование мероприятия</td>
                                <td><input text wire:model="name_event" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Срок исполнения</td>
                                <td><input text wire:model="date_perfom" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Ответственный исполнитель фамилия</td>
                                <td><input text wire:model="name_f" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><input text wire:model="name_l" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Отчество</td>
                                <td><input text wire:model="name_p" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата выполнения</td>
                                <td><input text wire:model="date_compl" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата переноса</td>
                                <td><input text wire:model="date_transfer" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Основание переноса срока</td>
                                <td><input text wire:model="reasons_post" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Причина переноса срока</td>
                                <td><input text wire:model="reasons_transfer" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Отметка о выполнении мероприятия</td>
                                <td><input text wire:model="check_exe" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Ghbvtxfybt</td>
                                <td><input text wire:model="note" id="title" style="min-width: 350px" /></td>
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

{{--</div>--}}
