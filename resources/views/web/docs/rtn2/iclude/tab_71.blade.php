<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r71" name="tab_group">
        <label for="r71" class="tab_title razd_col_tab">Раздел<br>7.1</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab71/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan71">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Вид происшествия</th>
                            <th>Содержание инцидента</th>
                            <th>Место инцидента</th>
                            <th>Дата инцидента</th>
                            <th>Ответсвенный за инцидент</th>
                            <th>Отметка о выполнении мероприятий, предложенных комиссией по расследованию несчастных случаев</th>
                            <th>Реализация мероприятий, предложенных комиссией (наименование файла из приложенного ZIP-архива)</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table71 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->type_accident}}</td>
                            <td>{{$row->desc_accident}}</td>
                            <td>{{$row->place}}</td>
                            <td>{{$row->date_accident}}</td>
                            <td>{{$row->respons_worker}}</td>
                            <td>{{$row->check_event}}</td>
                            <td>{{$row->event}}</td>

                            <td class="hover_links">
                                <a href="tab71/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab71/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal71" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 150px; margin-left: 30%; height: 600px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 600px">--}}
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
{{--                                <td>Вид происшествия</td>--}}
{{--                                <td><input type="text" wire:model="type_accident" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Содержание инцидента</td>--}}
{{--                                <td><input type="text" wire:model="desc_accident" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Место инцидента</td>--}}
{{--                                <td><input type="text" wire:model="place" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата инцидента</td>--}}
{{--                                <td><input type="text" wire:model="date_accident" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Ответсвенный за инцидент</td>--}}
{{--                                <td><input type="text" wire:model="respons_worker" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Отметка о выполнении мероприятий, предложенных комиссией по расследованию несчастных случаев</td>--}}
{{--                                <td><input type="text" wire:model="check_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Реализация мероприятий, предложенных комиссией (наименование файла из приложенного ZIP-архива)</td>--}}
{{--                                <td><input type="text" wire:model="event" id="title" style="min-width: 350px" /></td>--}}
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
