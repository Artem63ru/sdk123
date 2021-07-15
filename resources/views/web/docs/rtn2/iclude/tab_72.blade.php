<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r72" name="tab_group">
        <label for="r72" class="tab_title razd_col_tab">Раздел<br>7.2</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab72/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan72">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Дата утверждения положения</th>
                            <th>Должность лица, утвердившего положение</th>
                            <th>Фамилия лица, утвердившего положение</th>
                            <th>Имя, лица, утвердившего положение</th>
                            <th>Отчество (при наличии) лица, утвердившего положение</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table72 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->date_accept}}</td>
                            <td>{{$row->info_wort_to_accept}}</td>
                            <td>{{$row->fam_wort_to_accept}}</td>
                            <td>{{$row->name_wort_to_accept}}</td>
                            <td>{{$row->otch_wort_to_accept}}</td>

                            <td class="hover_links">
                                <a href="tab72/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab72/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal72" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 150px; margin-left: 30%; height: 465px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 465px">--}}
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
{{--                                <td>Дата утверждения положения</td>--}}
{{--                                <td><input type="text" wire:model="date_accept" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Должность лица, утвердившего положение</td>--}}
{{--                                <td><input type="text" wire:model="info_wort_to_accept" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Фамилия лица, утвердившего положение</td>--}}
{{--                                <td><input type="text" wire:model="fam_wort_to_accept" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Имя, лица, утвердившего положение</td>--}}
{{--                                <td><input type="text" wire:model="name_wort_to_accept" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Отчество (при наличии) лица, утвердившего положение</td>--}}
{{--                                <td><input type="text" wire:model="otch_wort_to_accept" id="title" style="min-width: 350px" /></td>--}}
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
