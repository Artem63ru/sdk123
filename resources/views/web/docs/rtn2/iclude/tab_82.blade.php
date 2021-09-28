{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_82">82</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_82');
        var tooltip=new Tooltip(tooltip_content, 'razd_82_tooltip', "r82_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r82" name="tab_group">
        <label for="r82" class="tab_title razd_col_tab" id="r82_label">Раздел<br>8.2</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab82/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan82">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Дата утверждения ПМЛА руководителем организации</th>
                            <th>Срок действия ПМЛА</th>
                            <th>Наименование профессиональной аварийно-спасательной службы или аварийно-спасательного формирования</th>
                            <th>Срок действия свидетельства о праве ведения соответствующих работ на ОПО</th>
                            <th>Сведения о наличии нештатных аварийно-спасательных формирований из числа работников</th>
                            <th>Копия действующего ПМЛА (в случае ее ненаправления ранее)</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table82 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->date_accept}}</td>
                            <td>{{$row->time}}</td>
                            <td>{{$row->name_service}}</td>
                            <td>{{$row->time_evidence}}</td>
                            <td>{{$row->info_other_service}}</td>
                            <td>{{$row->pmla_copy}}</td>

                            <td class="hover_links">
                                <a href="tab82/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab82/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal82" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 150px; margin-left: 30%; height: 550px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 550px">--}}
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
{{--                                <td>Дата утверждения ПМЛА руководителем организации</td>--}}
{{--                                <td><input type="text" wire:model="date_accept" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Срок действия ПМЛА</td>--}}
{{--                                <td><input type="text" wire:model="time" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наименование профессиональной аварийно-спасательной службы или аварийно-спасательного формирования</td>--}}
{{--                                <td><input type="text" wire:model="name_service" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Срок действия свидетельства о праве ведения соответствующих работ на ОПО</td>--}}
{{--                                <td><input type="text" wire:model="time_evidence" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Сведения о наличии нештатных аварийно-спасательных формирований из числа работников</td>--}}
{{--                                <td><input type="text" wire:model="info_other_service" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Копия действующего ПМЛА (в случае ее ненаправления ранее)</td>--}}
{{--                                <td><input type="text" wire:model="pmla_copy" id="title" style="min-width: 350px" /></td>--}}
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
