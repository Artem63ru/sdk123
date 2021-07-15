<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r51" name="tab_group">
        <label for="r51" class="tab_title razd_col_tab">Раздел<br>5.1</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab51/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan51">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Количество выявленных нарушений</th>
                            <th>Количество нарушений, не устраненных в установленные сроки</th>
                            <th>Количество привлечений работников за нарушения требований промышленной безопасности </th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table51 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->kol_vo_breach}}</td>
                            <td>{{$row->kol_vo_breach_nonpref}}</td>
                            <td>{{$row->kol_vo_attraction}}</td>

                            <td class="hover_links">
                                <a href="tab51/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab51/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal51" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 400px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 400px">--}}
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
{{--                                <td>Количество выявленных нарушений</td>--}}
{{--                                <td><input type="text" wire:model="kol_vo_breach" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Количество нарушений, не устраненных в установленные сроки</td>--}}
{{--                                <td><input type="text" wire:model="kol_vo_breach_nonpref" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Количество привлечений работников за нарушения требований промышленной безопасности</td>--}}
{{--                                <td><input type="text" wire:model="kol_vo_attraction" id="title" style="min-width: 350px" /></td>--}}
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
