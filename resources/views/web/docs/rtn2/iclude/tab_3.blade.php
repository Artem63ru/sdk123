{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_3">3</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_3');
        var tooltip=new Tooltip(tooltip_content, 'razd_3_tooltip', "r3_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r3" name="tab_group">
        <label for="r3" class="tab_title razd_col_tab" id="r3_label">Раздел<br>3</label>
        <section class="tab_content">

            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab3/new'}}>Добавить запись</a></div>

            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan3">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Дата утверждения положения о системе управления промышленной безопасностью</th>
                            <th>Дата утверждения плана мероприятий по снижению риска аварий на опасных производственных объектах</th>
                            <th>Период действия плана мероприятий плана мероприятий по снижению риска аварий на опасных производственных объектах (Дата окончания действия)</th>
                            <th>Анализ функционирования системы управления промышленной безопасностью за прошедший год (наименование файла)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table3 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->date_act}}</td>
                            <td>{{$row->date_plan_from}}</td>
                            <td>{{$row->period_event}}</td>
                            <td>{{$row->analitic}}</td>

                            <td class="hover_links">
                                <a href="tab3/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab3/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal3" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 500px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 500px">--}}
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
{{--                                <td>Дата утверждения положения о системе управления промышленной безопасностью</td>--}}
{{--                                <td><input type="text" wire:model="date_act" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата утверждения плана мероприятий по снижению риска аварий на опасных производственных объектах</td>--}}
{{--                                <td><input type="text" wire:model="date_plan_from" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Период действия плана мероприятий плана мероприятий по снижению риска аварий на опасных производственных объектах (Дата окончания действия)</td>--}}
{{--                                <td><input type="text" wire:model="period_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Анализ функционирования системы управления промышленной безопасностью за прошедший год (наименование файла)</td>--}}
{{--                                <td><input type="text" wire:model="analitic" id="title" style="min-width: 350px" /></td>--}}
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
