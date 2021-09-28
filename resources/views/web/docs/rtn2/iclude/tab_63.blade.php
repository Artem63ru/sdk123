{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_63">63</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_63');
        var tooltip=new Tooltip(tooltip_content, 'razd_63_tooltip', "r63_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r63" name="tab_group">
        <label for="r63" class="tab_title razd_col_tab" id="r63_label">Раздел 6.3</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab63/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan63">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Общее количество технических устройств (ТУ)</th>
                            <th>Количество ТУ с истекшим сроком эксплуатации</th>
                            <th>Файл, где приводится информация по количеству выведенных и находящихся в эксплуатации из этих ТУ</th>
                            <th>Количество замененных, модернизированных, вновь введенных в эксплуатацию ТУ за отчетный период</th>
                            <th>Файл, где приводится перечисление ТУ или номера ТУ, которые заменены, с указанием номеров, замененных ТУ или отремонтированных ТУ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table63 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->kol_vo_tu}}</td>
                            <td>{{$row->kol_vo_old_tu}}</td>
                            <td>{{$row->file_tu_out}}</td>
                            <td>{{$row->kol_vo_repair_tu}}</td>
                            <td>{{$row->file_tu_repair}}</td>

                            <td class="hover_links">
                                <a href="tab63/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab63/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal63" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 560px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 560px">--}}
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
{{--                                <td>Общее количество технических устройств (ТУ)</td>--}}
{{--                                <td><input type="text" wire:model="kol_vo_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Количество ТУ с истекшим сроком эксплуатации</td>--}}
{{--                                <td><input type="text" wire:model="kol_vo_old_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Файл, где приводится информация по количеству выведенных и находящихся в эксплуатации из этих ТУ</td>--}}
{{--                                <td><input type="text" wire:model="file_tu_out" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Количество замененных, модернизированных, вновь введенных в эксплуатацию ТУ за отчетный период</td>--}}
{{--                                <td><input type="text" wire:model="kol_vo_repair_tu" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Файл, где приводится перечисление ТУ или номера ТУ, которые заменены, с указанием номеров, замененных ТУ или отремонтированных ТУ</td>--}}
{{--                                <td><input type="text" wire:model="file_tu_repair" id="title" style="min-width: 350px" /></td>--}}
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
