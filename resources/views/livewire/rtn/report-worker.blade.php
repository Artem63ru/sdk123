<div style="display: inline-block; width: 10%;">
    <div style="width: 100%" class="tab">
    <input type="radio" id="r41" name="tab_group">
    <label for="r41" class="tab_title razd_col_tab">Раздел 4.1</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan41">
                    <table>
                        <thead>
                        <tr>
                            <th colspan="3" class="centered">ФИО сотрудника, осуществляющего ПК</th>
                            <th rowspan="2">Должность </th>
                            <th rowspan="2" class="centered">Образование</th>
                            <th rowspan="2" class="centered">Стаж работы</th>
                            <th rowspan="2" class="centered">Дата последней аттестации</th>
                            <th rowspan="2">Зона ответственности</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="centered">Фамилия </th>
                            <th class="centered">Имя </th>
                            <th class="centered">Общество </th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->surname}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->sub_name}}</td>
                                <td>{{$row->post}}</td>
                                <td>{{$row->education}}</td>
                                <td>{{$row->work_exp}}</td>
                                <td>{{$row->last_attestation}}</td>
                                <td>{{$row->responsibility}}</td>
                                <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal41"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>

    <div id="openModal41" class="modal">
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
                                <td>Фамилия сотрудника, осуществляющего ПК </td>
                                <td><input type="text" wire:model="surname" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><input text wire:model="name" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Отчество</td>
                                <td><input text wire:model="sub_name" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Должность</td>
                                <td><input text wire:model="post" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Образование</td>
                                <td><input text wire:model="education" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Стаж</td>
                                <td><input text wire:model="work_exp" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата аттестации</td>
                                <td><input text wire:model="last_attestation" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Ответственность</td>
                                <td><input text wire:model="responsibility" id="title" style="min-width: 350px" /></td>
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

</div>
</div>

