<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r53" name="tab_group">
        <label for="r53" class="tab_title razd_col_tab">Раздел 5.3</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab53/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan53">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Перечень предложений</th>
                            <th>Мероприятия по реализации предложений (наименование файла c расширением *.PDF/A из приложенного ZIP-архива)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table53 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->offer_list}}</td>
                            <td>{{$row->event}}</td>

                            <td class="hover_links">
                                <a href="tab53/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab53/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal53" class="modal">--}}
{{--        <div class="modal-dialog table_use" style="margin-top: 200px; margin-left: 30%; height: 380px">--}}
{{--            <div class="modal-content" style="width: 750px; height: 380px">--}}
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
{{--                                <td>Перечень предложений</td>--}}
{{--                                <td><input type="text" wire:model="offer_list" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Мероприятия по реализации предложений (наименование файла c расширением *.PDF/A из приложенного ZIP-архива)</td>--}}
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
