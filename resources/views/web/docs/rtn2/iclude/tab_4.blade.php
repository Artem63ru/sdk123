<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r4" name="tab_group">
        <label for="r4" class="tab_title razd_col_tab">Раздел<br>4</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab4/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan4">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Наименование мероприятия</th>
                            <th>Дата выполнения</th>
                            <th>Отметка о выполнении</th>
                            <th>Файл с указанием ссылок на оформленные документы</th>
                            <th>Причины невыполнения</th>
                            <th>Дата заключения экспертизы промышленной безопасности (при наличии)</th>
                            <th>Регистрационный номер заключения экспертизы промышленной безопасности (при наличии)</th>
                            <th>Информация о выполнении/невыполнении требований обоснования безопасности</th>
                            <th>Ссылки на офиициальные документы</th>
                            <th>Причины невыполнения требований обоснования безопасности</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table4 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->name_event}}</td>
                            <td>{{$row->date_accept}}</td>
                            <td>{{$row->check_event}}</td>
                            <td>{{$row->file}}</td>
                            <td>{{$row->reason_nonpref}}</td>
                            <td>{{$row->recvisits_1}}</td>
                            <td>{{$row->recvisits_2}}</td>
                            <td>{{$row->check_require}}</td>
                            <td>{{$row->doc}}</td>
                            <td>{{$row->reason_nonpref_require}}</td>

                            <td class="hover_links">
                                <a href="tab4/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab4/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal4" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 700px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 700px">--}}
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
{{--                                <td>Наименование мероприятия</td>--}}
{{--                                <td><input type="text" wire:model="name_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата выполнения</td>--}}
{{--                                <td><input type="text" wire:model="date_accept" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Отметка о выполнении</td>--}}
{{--                                <td><input type="text" wire:model="check_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Файл с указанием ссылок на оформленные документы</td>--}}
{{--                                <td><input type="text" wire:model="file" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Причины невыполнения</td>--}}
{{--                                <td><input type="text" wire:model="reason_nonpref" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата заключения экспертизы промышленной безопасности (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="recvisits_1" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Регистрационный номер заключения экспертизы промышленной безопасности (при наличии)</td>--}}
{{--                                <td><input type="text" wire:model="recvisits_2" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Информация о выполнении/невыполнении требований обоснования безопасности</td>--}}
{{--                                <td><input type="text" wire:model="check_require" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Ссылки на офиициальные документы</td>--}}
{{--                                <td><input type="text" wire:model="doc" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Причины невыполнения требований обоснования безопасности</td>--}}
{{--                                <td><input type="text" wire:model="reason_nonpref_require" id="title" style="min-width: 350px" /></td>--}}
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
