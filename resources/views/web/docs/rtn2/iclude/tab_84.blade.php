{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_84">84</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_84');
        var tooltip=new Tooltip(tooltip_content, 'razd_84_tooltip', "r84_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r84" name="tab_group">
        <label for="r84" class="tab_title razd_col_tab" id="r84_label">Раздел 8.4</label>
        <section class="tab_content" >
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab84/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan84">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Численность сотрудников, работающих на ОПО, успешно прошедших</th>
                            <th>Заключение о готовности/неготовности работников к действиям по локализации и ликвидации последствий</th>
                            <th>Комментарий к оценке готовности (прикладывается по решению ответственного лица)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table84 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->kol_vo_worker}}</td>
                            <td>{{$row->result_ready}}</td>
                            <td>{{$row->comment}}</td>

                            <td class="hover_links">
                                <a href="tab84/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab84/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal84" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 450px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 450px">--}}
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
{{--                                <td><input text wire:model="num_opo" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Численность сотрудников, работающих на ОПО, успешно прошедших</td>--}}
{{--                                <td><input type wire:model="kol_vo_worker" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Заключение о готовности/неготовности работников к действиям по локализации и ликвидации последствий</td>--}}
{{--                                <td><input type wire:model="result_ready" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Комментарий к оценке готовности (прикладывается по решению ответственного лица)</td>--}}
{{--                                <td><input type wire:model="comment" id="title" style="min-width: 350px" /></td>--}}
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
