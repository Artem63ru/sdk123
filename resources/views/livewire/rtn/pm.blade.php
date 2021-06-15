{{--<div>--}}

        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan22">
                    <table>
                        <thead>
                        <tr>

                            <th rowspan="2">Наименование аварии </th>
                            <th rowspan="2" class="centered">Уровень аварии</th>
                            <th rowspan="2">Место аварии</th>
                            <th rowspan="2">Опознавательные признаки аварии</th>
                            <th rowspan="2">Оптимальные способы противоаварийной защиты</th>
                            <th rowspan="2">Технические средства (системы) противоаварийной защиты, применяемые при подавлении и локализации аварии</th>
                            <th colspan="8" class="centered">Ответственный руководитель работ по локализации и ликвидации аварии</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="centered">Фамилия </th>
                            <th class="centered">Имя </th>
                            <th class="centered">Отчество </th>
                            <th class="centered">Образование </th>
                            <th class="centered">Стаж работы </th>
                            <th class="centered">Дата последней аттестации </th>
                            <th class="centered">Порядок действий </th>
                            <th class="centered">Комментарий к оценке готовности </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->name_crash}}</td>
                                <td>{{$row->level_crash}}</td>
                                <td>{{$row->place_crash}}</td>
                                <td>{{$row->sign_crash}}</td>
                                <td>{{$row->metod_protect}}</td>
                                <td>{{$row->name_paz}}</td>
                                <td>{{$row->name_f}}</td>
                                <td>{{$row->name_l}}</td>
                                <td>{{$row->name_p}}</td>
                                <td>{{$row->education_worker}}</td>
                                <td>{{$row->exper_worker}}</td>
                                <td>{{$row->date_certif}}</td>
                                {{--                                <td>{{$row->order_action}}</td>--}}
                                <td>{{$row->comments}}</td>
                                <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal22"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>

    <div id="openModal22" class="modal">
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
                                <td>Наименование аварии</td>
                                <td><input type="text" wire:model="name_crash" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Уровень аварии</td>
                                <td><input text wire:model="level_crash" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Место аварии</td>
                                <td><input text wire:model="place_crash" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Опознавательные признаки аварии</td>
                                <td><input text wire:model="sign_crash" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Оптимальные способы противоаварийной защиты</td>
                                <td><input text wire:model="metod_protect" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Технические средства (системы) противоаварийной защиты, применяемые при подавлении и локализации аварии</td>
                                <td><input text wire:model="name_paz" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Ответственный руководитель работ по локализации и ликвидации аварии фамилия</td>
                                <td><input text wire:model="name_f" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><input text wire:model="name_l" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Отчество</td>
                                <td><input text wire:model="name_p" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Образование</td>
                                <td><input text wire:model="education_worker" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Стаж работы</td>
                                <td><input text wire:model="exper_worker" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата последней аттестации</td>
                                <td><input text wire:model="order_action" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Порядок действий</td>
                                <td><input text wire:model="order_action" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Комментарий к оценке готовности</td>
                                <td><input text wire:model="comments" id="title" style="min-width: 350px" /></td>
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

