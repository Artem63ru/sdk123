<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r83" name="tab_group">
        <label for="r83" class="tab_title razd_col_tab">Раздел<br>8.3</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab83/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan83">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Информация о мероприятиях по локализации и ликвидации последствий аварий</th>
                            <th>Файл с информацией по планируемым мероприятиям</th>
                            <th>Наличие договора на обслуживание</th>
                            <th>Дата заключения договора</th>
                            <th>Номер договора</th>
                            <th>Дата окончания договора</th>
                            <th>Исполнитель по договору</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table83 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->info_event}}</td>
                            <td>{{$row->file_info}}</td>
                            <td>{{$row->check_agreement}}</td>
                            <td>{{$row->date_agreement}}</td>
                            <td>{{$row->nym_agreement}}</td>
                            <td>{{$row->date_end_agreement}}</td>
                            <td>{{$row->isp_agreement}}</td>

                            <td class="hover_links">
                                <a href="tab83/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab83/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal83" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 150px; margin-left: 30%; height: 500px">--}}
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
{{--                                <td>Информация о мероприятиях по локализации и ликвидации</td>--}}
{{--                                <td><input type="text" wire:model="info_event" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Файл с информацией по планируемым мероприятиям</td>--}}
{{--                                <td><input type="text" wire:model="file_info" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наличие договора на обслуживание</td>--}}
{{--                                <td><input type="text" wire:model="check_agreement" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата заключения договора</td>--}}
{{--                                <td><input type="text" wire:model="date_agreement" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Номер договора</td>--}}
{{--                                <td><input type="text" wire:model="nym_agreement" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Дата окончания договора</td>--}}
{{--                                <td><input type="text" wire:model="date_end_agreement" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Исполнитель по договору</td>--}}
{{--                                <td><input type="text" wire:model="isp_agreement" id="title" style="min-width: 350px" /></td>--}}
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
