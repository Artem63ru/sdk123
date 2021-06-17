<div style="display: inline-block; width: 10%;">
    <div style="width: 100%" class="tab">
    <input type="radio" id="r31" name="tab_group">
    <label for="r31" class="tab_title razd_col_tab">Раздел 3.1</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan31">
                    <table>
                        <thead>
                        <tr>
                            <th rowspan="2" class="centered">Регистрационный номер ОПО</th>
                            <th rowspan="2" class="centered">Регистрационный (учетный) номер оборудования ТУ</th>
                            <th rowspan="2" class="centered">Наименование ТУ</th>
                            <th rowspan="2" class="centered">Серийный номер ТУ</th>
                            <th rowspan="2" class="centered">Государственный регистрационный знак</th>
                            <th rowspan="2" class="centered">Заводской номер ТУ</th>
                            <th rowspan="2" class="centered">Тип ТУ</th>
                            <th rowspan="2" class="centered">Вид ТУ</th>
                            <th rowspan="2" class="centered">Марка ТУ</th>
                            <th rowspan="2" class="centered">Нормативный срок эксплуатации (лет)</th>
                            <th rowspan="2" class="centered">Год ввода в эксплуатацию</th>
                            <th rowspan="2" class="centered">Процент износа</th>
                            <th rowspan="2" class="centered">Дата проведения экспертизы промышленной безопасности</th>
                            <th rowspan="2" class="centered">Дата следующей экспертизы промышленной безопасности</th>
                            <th rowspan="2" class="centered">Дата очередной проверки (технического освидетельствования)</th>
                            <th rowspan="2" class="centered">Дата следующей проверки (технического освидетельствования)</th>
                            <th rowspan="2" class="centered">Разрешенный срок эксплуатации</th>
                            <th rowspan="2" class="centered">Наличие предохранительного устройства</th>
                            <th rowspan="2" class="centered">Тип предохранительного устройства</th>

                            <th colspan="3" class="centered">Объекты использования, переработки, образования, хранения, транспортировки, уничтожения опасных веществ</th>
                            <th colspan="3" class="centered">Грузоподъемные сооружения</th>
                            <th colspan="2" class="centered">Оборудование, работающее при избыточном давлении >0,07 МПа или при температуре >1150С</th>
                            <th colspan="2" class="centered">Сведения о модернизации</th>
                            <th colspan="4" class="centered">Сведения о сертификации</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="centered">Объем (м3)</th>
                            <th class="centered">Давление, МПа</th>
                            <th class="centered">Dy, мм</th>
                            <th class="centered">Тип</th>
                            <th class="centered">Подтип</th>
                            <th class="centered">Грузоподъемность</th>
                            <th class="centered">Объем, т</th>
                            <th class="centered">Давление, МПа</th>
                            <th class="centered">Год модернизации</th>
                            <th class="centered">Проведенные мероприятия</th>
                            <th class="centered">Тип сертификата</th>
                            <th class="centered">Номер сертификата</th>
                            <th class="centered">Дата сертификата</th>
                            <th class="centered">Кем выдан сертификат</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->reg_n_opo}}</td>
                                <td>{{$row->reg_n_tu}}</td>
                                <td>{{$row->name_tu}}</td>
                                <td>{{$row->serial_n_tu}}</td>
                                <td>{{$row->gos_reg_n}}</td>
                                <td>{{$row->factory_n_tu}}</td>
                                <td>{{$row->type_tu}}</td>
                                <td>{{$row->vid_tu}}</td>
                                <td>{{$row->marks_tu}}</td>
                                <td>{{$row->service_life}}</td>
                                <td>{{$row->commissioning}}</td>
                                <td>{{$row->wear_out}}</td>
                                <td>{{$row->date_exam}}</td>
                                <td>{{$row->date_next_exam}}</td>
                                <td>{{$row->date_to}}</td>
                                <td>{{$row->date_next_to}}</td>
                                <td>{{$row->perm_life}}</td>
                                <td>{{$row->safety_device}}</td>
                                <td>{{$row->type_safety_dev}}</td>
                                <td>{{$row->volume}}</td>
                                <td>{{$row->pressure}}</td>
                                <td>{{$row->diam}}</td>
                                <td>{{$row->gs_type}}</td>
                                <td>{{$row->gs_sub_type}}</td>
                                <td>{{$row->gs_mass}}</td>
                                <td>{{$row->or_volume}}</td>
                                <td>{{$row->or_pressure}}</td>
                                <td>{{$row->year_modern}}</td>
                                <td>{{$row->activities_carried}}</td>
                                <td>{{$row->sert_type}}</td>
                                <td>{{$row->sert_number}}</td>
                                <td>{{$row->sert_date}}</td>
                                <td>{{$row->sert_issued}}</td>
                                <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal31"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
</div>
    <div id="openModal31" class="modal">
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
                                <td>Регистрационный номер ОПО</td>
                                <td><input type="text" wire:model="reg_n_opo" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Регистрационный (учетный) номер оборудования ТУ</td>
                                <td><input text wire:model="reg_n_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Наименование ТУ</td>
                                <td><input text wire:model="name_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Серийный номер ТУ</td>
                                <td><input text wire:model="serial_n_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Государственный регистрационный знак</td>
                                <td><input text wire:model="gos_reg_n" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Заводской номер ТУ</td>
                                <td><input text wire:model="factory_n_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Тип ТУ</td>
                                <td><input text wire:model="type_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Вид ТУ</td>
                                <td><input text wire:model="vid_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Марка ТУ</td>
                                <td><input text wire:model="marks_tu" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Нормативный срок эксплуатации (лет)</td>
                                <td><input text wire:model="service_life" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Год ввода в эксплуатацию</td>
                                <td><input text wire:model="commissioning" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Процент износа</td>
                                <td><input text wire:model="wear_out" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата проведения экспертизы промышленной безопасности</td>
                                <td><input text wire:model="date_exam" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата следующей экспертизы промышленной безопасности</td>
                                <td><input text wire:model="date_next_exam" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата очередной проверки (технического освидетельствования)</td>
                                <td><input text wire:model="date_to" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата следующей проверки (технического освидетельствования)</td>
                                <td><input text wire:model="date_next_to" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Разрешенный срок эксплуатации</td>
                                <td><input text wire:model="perm_life" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Наличие предохранительного устройства</td>
                                <td><input text wire:model="safety_device" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Тип предохранительного устройства</td>
                                <td><input text wire:model="type_safety_dev" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Объекты использования, переработки, образования, хранения, транспортировки, уничтожения опасных веществ Объем (м3)</td>
                                <td><input text wire:model="volume" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Давление, МПа</td>
                                <td><input text wire:model="pressure" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Dy, мм</td>
                                <td><input text wire:model="diam" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Грузоподъемные сооружения Тип</td>
                                <td><input text wire:model="gs_type" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Грузоподъемные сооружения Подтип</td>
                                <td><input text wire:model="gs_sub_type" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Грузоподъемные сооружения Грузоподъёмность</td>
                                <td><input text wire:model="gs_mass" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Оборудование, работающее при избыточном давлении >0,07 МПа или при температуре >1150С	Объем</td>
                                <td><input text wire:model="or_volume" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Оборудование, работающее при избыточном давлении >0,07 МПа или при температуре >1150С	Давление</td>
                                <td><input text wire:model="or_pressure" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Год модернизации</td>
                                <td><input text wire:model="year_modern" id="title" style="min-width: 350px" /></td>
                            </tr>

                            <tr>
                                <td>Проведенные мероприятия</td>
                                <td><input text wire:model="activities_carried" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Сведения о модернизации</td>
                                <td><input text wire:model="sert_type" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Номер сертификата</td>
                                <td><input text wire:model="sert_number" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Дата сертификата</td>
                                <td><input text wire:model="sert_date" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Кем выдан сертификат</td>
                                <td><input text wire:model="sert_issued" id="title" style="min-width: 350px" /></td>
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
