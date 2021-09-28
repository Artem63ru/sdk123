{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_521">521</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_521');
        var tooltip=new Tooltip(tooltip_content, 'razd_521_tooltip', "r521_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r521" name="tab_group">
        <label for="r521" class="tab_title razd_col_tab" id="r521_label">Раздел<br>5.2.1</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab521/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan521">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Наименование работ</th>
                            <th>Учётный номер технического устройства</th>
                            <th>Причины приостановления работ/приостановления эксплуатации технического устройства ТУ</th>
                            <th>Срок приостановления</th>
                            <th>Выполненные мероприятия по устранению причин приостановки работ/приостановки эксплуатации ТУ</th>
                            <th>Дата документа о разрешении возобновления работ/эксплуатации ТУ</th>
                            <th>Номер документа о разрешении возобновления работ/эксплуатации ТУ</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table521 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->name_job}}</td>
                            <td>{{$row->num_tu}}</td>
                            <td>{{$row->reason_stop}}</td>
                            <td>{{$row->time_stop}}</td>
                            <td>{{$row->check_event}}</td>
                            <td>{{$row->date_act}}</td>
                            <td>{{$row->num_act}}</td>

                            <td class="hover_links">
                                <a href="tab521/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab521/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal521" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 565px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 565px">--}}
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
{{--                                <td>Наименование работ</td>--}}
{{--                                <td><input type="text" wire:model="name_job" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Учётный номер технического устройства</td>--}}
{{--                                <td><input type="text" wire:model="num_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Причины приостановления работ/приостановления эксплуатации ТУ</td>--}}
{{--                                <td><input type="text" wire:model="reason_stop" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Срок приостановления</td>--}}
{{--                                <td><input type="text" wire:model="time_stop" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Выполненные мероприятия по устранению причин приостановки работ/приостановки эксплуатации ТУ</td>--}}
{{--                                <td><input type="text" wire:model="check_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата документа о разрешении возобновления работ/эксплуатации ТУ</td>--}}
{{--                                <td><input type="text" wire:model="date_act" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Регистрационный номер заключения экспертизы промышленной безопасности (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="num_act" id="title" style="min-width: 350px" /></td>--}}
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
