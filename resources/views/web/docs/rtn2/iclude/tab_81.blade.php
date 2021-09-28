{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_81">81</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_81');
        var tooltip=new Tooltip(tooltip_content, 'razd_81_tooltip', "r81_label");
    })
</script>

<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r81" name="tab_group">
        <label for="r81" class="tab_title razd_col_tab" id="r81_label">Раздел<br>8.1</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab81/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan81">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            <th>Образование</th>
                            <th>Стаж работы в области промышленной безопасности</th>
                            <th>Наличие резервов финансовых средств и материальных ресурсов для локализации и ликвидации последствий аварий</th>
                            <th>Наличие систем наблюдения, оповещения, связи и поддержки действий в случае аварии</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table81 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->fam}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->otch}}</td>
                            <td>{{$row->education}}</td>
                            <td>{{$row->experiens}}</td>
                            <td>{{$row->check_resurs}}</td>
                            <td>{{$row->check_system_monitoring}}</td>

                            <td class="hover_links">
                                <a href="tab81/delete/{{ $row->id }}"><img wire:click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab81/edit/{{ $row->id }}"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
{{--    <div id="openModal81" class="modal">--}}
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
{{--                                <td>Фамилия</td>--}}
{{--                                <td><input type="text" wire:model="fam" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Имя</td>--}}
{{--                                <td><input type="text" wire:model="name" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Отчество</td>--}}
{{--                                <td><input type="text" wire:model="otch" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Образование</td>--}}
{{--                                <td><input type="text" wire:model="education" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Стаж работы в области промышленной безопасности</td>--}}
{{--                                <td><input type="text" wire:model="experiens" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наличие резервов финансовых средств и материальных ресурсов для локализации и ликвидации последствий аварий</td>--}}
{{--                                <td><input type="text" wire:model="check_resurs" id="title" style="min-width: 350px" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Наличие систем наблюдения, оповещения, связи и поддержки действий в случае аварии</td>--}}
{{--                                <td><input type="text" wire:model="check_system_monitoring" id="title" style="min-width: 350px" /></td>--}}
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
