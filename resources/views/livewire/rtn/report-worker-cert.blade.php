{{--<div>--}}

        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan42">
                    <table>
                        <thead>
                        <tr>
                            <th class="centered">Вид надзора</th>
                            <th class="centered">Руководители</th>
                            <th class="centered">Специалисты</th>
                            <th class="centered">Рабочие</th>
                            <th class="centered">Количество персонала, занятого при эксплуатации ТУ, применяемых на ОПО</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->type_super}}</td>
                                <td>{{$row->manager}}</td>
                                <td>{{$row->special}}</td>
                                <td>{{$row->worker}}</td>
                                <td>{{$row->all_work}}</td>
                                <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal42"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>

    <div id="openModal42" class="modal">
        <div class="modal-dialog table_use" style="margin-top: 150px">
            <div class="modal-content" style="width: 650px; height: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Редактировать</h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Вид надзора</td>
                                <td><input type="text" wire:model="type_super" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Руководители</td>
                                <td><input text wire:model="manager" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Специалисты</td>
                                <td><input text wire:model="special" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Рабочие</td>
                                <td><input text wire:model="worker" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Количество персонала, занятого при эксплуатации ТУ, применяемых на ОПО</td>
                                <td><input text wire:model="all_work" id="title" style="min-width: 350px" /></td>
                            </tr>

                            <td colspan="2" class="link_td centered"><button type="submit" class="create" wire:click.prevent="update()">
                                    Сохранить
                                </button></td>
                            </tbody>


                        </table>
                    </form>
                    <div>

                    </div>

                </div>
            </div>
        </div>
    </div>

{{--</div>--}}

