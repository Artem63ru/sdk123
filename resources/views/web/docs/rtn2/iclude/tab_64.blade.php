{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_64">64</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_64');
        var tooltip=new Tooltip(tooltip_content, 'razd_64_tooltip', "r64_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r64" name="tab_group">
        <label for="r64" class="tab_title razd_col_tab" id="r64_label">Раздел 6.4</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab64/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan64">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Регистрационный (учетный) номер оборудования (ТУ)</th>
                            <th>Наименование ТУ</th>
                            <th>Серийный номер ТУ</th>
                            <th>Заводской номер ТУ</th>
                            <th>Инвентарный номер ТУ</th>
                            <th>Тип ТУ (из справочника)</th>
                            <th>Тип ТУ (ручной ввод)</th>
                            <th>Вид ТУ (из справочника)</th>
                            <th>Вид ТУ (ручной ввод)</th>
                            <th>Марка ТУ (при наличии)</th>
                            <th>Страна-производитель</th>
                            <th>Нормативный срок службы/эксплуатации (лет)</th>
                            <th>Год ввода в эксплуатацию</th>
                            <th>Процент износа</th>
                            <th>Сведения о модернизации</th>
                            <th>Номер документа, подтверждающего соответствие ТУ требованиям технического регламента</th>
                            <th>Наличие технической документации ТУ</th>
                            <th>Дата проведения экспертизы промышленной безопасности</th>
                            <th>Вывод о соответствии объекта требованиям промышленной безопасности</th>
                            <th>Если ранее указан код "3", то указать сведения о принятых мерах по недопущению эксплуатации неисправного ТУ</th>
                            <th>Разрешенный срок эксплуатации</th>
                            <th>Количество разрешенных циклов нагрузк</th>
                            <th>Фактический срок службы</th>
                            <th>Количество факт циклов нагрузки</th>
                            <th>Наличие средств контроля (приборы безопасности, средства измерений)</th>
                            <th>Сведения о ТУ, находящихся в опытной эксплуатации</th>
                            <th>Период опытной эксплуатаци</th>
                            <th>Сведения о соответствии установленных на ТУ (оборудовании) предохранительных устройств проекту</th>
                            <th>Сведения о принятых мерах по недопущению эксплуатации неисправного оборудования/технических устройств</th>
                            <th>ТУ заменено</th>
                            <th>Номер ТУ на которое заменено</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table64 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->num_tu}}</td>
                            <td>{{$row->name_tu}}</td>
                            <td>{{$row->serial_num}}</td>
                            <td>{{$row->industrial_num}}</td>
                            <td>{{$row->invent_num}}</td>

                            <td>{{$row->type_auto}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->vid_auto}}</td>
                            <td>{{$row->vid}}</td>
                            <td>{{$row->mark}}</td>
                            <td>{{$row->country}}</td>

                            <td>{{$row->time_exp}}</td>
                            <td>{{$row->year_exp}}</td>
                            <td>{{$row->old_percent}}</td>
                            <td>{{$row->repair_info}}</td>
                            <td>{{$row->num_doc}}</td>
                            <td>{{$row->doc_check}}</td>

                            <td>{{$row->date_check}}</td>
                            <td>{{$row->result_check}}</td>
                            <td>{{$row->info_event_check}}</td>
                            <td>{{$row->accept_time}}</td>
                            <td>{{$row->accept_kol_vo}}</td>
                            <td>{{$row->fact_time}}</td>

                            <td>{{$row->fact_kol_vo}}</td>
                            <td>{{$row->check_control}}</td>
                            <td>{{$row->info_demo_tu}}</td>
                            <td>{{$row->time_demo}}</td>
                            <td>{{$row->info_devices}}</td>
                            <td>{{$row->info_event}}</td>

                            <td>{{$row->tu_repair_check}}</td>
                            <td>{{$row->num_new_tu}}</td>

                            <td class="hover_links">
                                <a href="tab64/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab64/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal64" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 100px; margin-left: 30%; height: 800px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 800px">--}}
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
{{--                                <td>Регистрационный (учетный) номер оборудования (ТУ)</td>--}}
{{--                                <td><input type="text" wire:model="num_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наименование ТУ</td>--}}
{{--                                <td><input type="text" wire:model="name_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Серийный номер ТУ</td>--}}
{{--                                <td><input type="text" wire:model="serial_num" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Заводской номер ТУ</td>--}}
{{--                                <td><input type="text" wire:model="industrial_num" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Инвентарный номер ТУ</td>--}}
{{--                                <td><input type="text" wire:model="invent_num" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}





{{--                            <tr>--}}
{{--                                <td>Тип ТУ (из справочника)</td>--}}
{{--                                <td><input type="text" wire:model="type_auto" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Тип ТУ (ручной ввод)</td>--}}
{{--                                <td><input type="text" wire:model="type" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Вид ТУ (из справочника)/td>--}}
{{--                                <td><input type="text" wire:model="vid_auto" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Вид ТУ (ручной ввод)</td>--}}
{{--                                <td><input type="text" wire:model="vid" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Марка ТУ (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="mark" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Страна-производитель</td>--}}
{{--                                <td><input type="text" wire:model="country" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}






{{--                            <tr>--}}
{{--                                <td>Нормативный срок службы/эксплуатации (лет)</td>--}}
{{--                                <td><input type="text" wire:model="time_exp" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Год ввода в эксплуатацию</td>--}}
{{--                                <td><input type="text" wire:model="year_exp" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Процент износа</td>--}}
{{--                                <td><input type="text" wire:model="old_percent" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Сведения о модернизации</td>--}}
{{--                                <td><input type="text" wire:model="repair_info" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Номер документа, подтверждающего соответствие ТУ требованиям технического регламента</td>--}}
{{--                                <td><input type="text" wire:model="num_doc" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наличие технической документации ТУ</td>--}}
{{--                                <td><input type="text" wire:model="doc_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}




{{--                            <tr>--}}
{{--                                <td>Дата проведения экспертизы промышленной безопасност</td>--}}
{{--                                <td><input type="text" wire:model="date_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Вывод о соответствии объекта требованиям промышленной безопасности </td>--}}
{{--                                <td><input type="text" wire:model="result_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Если ранее указан код "3", то указать сведения о принятых мерах по недопущению эксплуатации неисправного ТУ</td>--}}
{{--                                <td><input type="text" wire:model="info_event_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Разрешенный срок эксплуатации</td>--}}
{{--                                <td><input type="text" wire:model="accept_time" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Количество разрешенных циклов нагрузк</td>--}}
{{--                                <td><input type="text" wire:model="accept_kol_vo" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Фактический срок службы</td>--}}
{{--                                <td><input type="text" wire:model="fact_time" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}




{{--                            <tr>--}}
{{--                                <td>Количество факт циклов нагрузки</td>--}}
{{--                                <td><input type="text" wire:model="fact_kol_vo" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наличие средств контроля (приборы безопасности, средства измерений)</td>--}}
{{--                                <td><input type="text" wire:model="check_control" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Сведения о ТУ, находящихся в опытной эксплуатаци</td>--}}
{{--                                <td><input type="text" wire:model="info_demo_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Период опытной эксплуатаци</td>--}}
{{--                                <td><input type="text" wire:model="time_demo" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Сведения о соответствии установленных на ТУ (оборудовании) предохранительных устройств проекту</td>--}}
{{--                                <td><input type="text" wire:model="info_devices" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Сведения о принятых мерах по недопущению эксплуатации неисправного оборудования/технических устройств при на</td>--}}
{{--                                <td><input type="text" wire:model="info_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}






{{--                            <tr>--}}
{{--                                <td>ТУ заменено</td>--}}
{{--                                <td><input type="text" wire:model="tu_repair_check" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Номер ТУ на которое заменено</td>--}}
{{--                                <td><input type="text" wire:model="num_new_tu" id="title" style="min-width: 350px" /></td>--}}
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
