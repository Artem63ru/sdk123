<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r62" name="tab_group">
        <label for="r62" class="tab_title razd_col_tab">Раздел<br>6.2</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab62/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan62">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Наименование здания/сооружения, входящего в состав ОПО</th>
                            <th>Год ввода в эксплуатацию здания, эксплуатируемого на ОПО</th>
                            <th>Дата окончания реконструкции здания (при наличии)</th>
                            <th>Дата окончания капитального ремонта (при наличии)</th>
                            <th>Дата следующей экспертизы промышленной безопасности (при наличии)</th>
                            <th>Дата проведения экспертизы промышленной безопасности (при наличии)</th>
                            <th>Вывод о соответствии объекта требованиям промышленной безопасности </th>
                            <th>Если выбрано "Не в полной мере соответствует", то указать процент выполненных мероприятий из назначенных</th>
                            <th>Файл, содержащий информацию о выполненных мероприятиях или информацию по выводу здания из эксплуатации </th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table62 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->year_exp}}</td>
                            <td>{{$row->date_reconstruction}}</td>
                            <td>{{$row->date_repair}}</td>
                            <td>{{$row->date_next_check}}</td>
                            <td>{{$row->date_check}}</td>
                            <td>{{$row->result_check}}</td>
                            <td>{{$row->percent_event}}</td>
                            <td>{{$row->file}}</td>

                            <td class="hover_links">
                                <a href="tab62/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab62/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal62" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 150px; margin-left: 30%; height: 750px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 750px">--}}
{{--                <div class="modal-header">--}}
{{--                    <a href="#close" title="Close" class="close">×</a>--}}
{{--                </div>--}}
{{--                <div class="modal-body ">--}}
{{--                    <h2 style="text-align: center">Редактировать</h2>--}}
{{--                    <form>--}}
{{--                        <table class="modal_table map_hover">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>Регистрационный номер ОПО</td>--}}
{{--                                <td><input type="text" wire:model="num_opo" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наименование здания/сооружения, входящего в состав ОПО</td>--}}
{{--                                <td><input type="text" wire:model="name" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Год ввода в эксплуатацию здания, эксплуатируемого на ОПО</td>--}}
{{--                                <td><input type="text" wire:model="year_exp" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата окончания реконструкции здания (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="date_reconstruction" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата окончания капитального ремонта (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="date_repair" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата следующей экспертизы промышленной безопасности (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="date_next_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата проведения экспертизы промышленной безопасности (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="date_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Вывод о соответствии объекта требованиям промышленной безопасности </td>--}}
{{--                                <td><input type="text" wire:model="result_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Если выбрано "Не в полной мере соответствует", то указать процент выполненных мероприятий из назначенных</td>--}}
{{--                                <td><input type="text" wire:model="percent_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Файл, содержащий информацию о выполненных мероприятиях или информацию по выводу здания из эксплуатации </td>--}}
{{--                                <td><input type="text" wire:model="file" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}



{{--                            <td colspan="2" class="link_td centered">--}}
{{--                                <button type="submit" class="create" wire:click.prevent="update()">--}}
{{--                                    Сохранить--}}
{{--                                </button></td>--}}
{{--                            </tbody>--}}


{{--                        </table>--}}
{{--                    </form>--}}
{{--                    <div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
