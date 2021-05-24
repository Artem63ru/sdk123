<div>
    <div class="tab">
        <input type="radio" id="r11" name="tab_group">
        <label for="r11" class="tab_title razd_col_tab">Раздел 1.1</label>
        <section class="tab_content">
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new">
                    <table>
                        <thead>
                        <tr>
                            <th rowspan="2">Регистрационный номер ОПО </th>
                            <th rowspan="2">Наименование мероприятия</th>
                            <th rowspan="2" class="centered">Срок исполнения</th>
                            <th colspan="3" class="centered">Ответственный исполнитель</th>
                            <th rowspan="2" class="centered">Дата выполнения</th>
                            <th rowspan="2" class="centered">Дата переноса</th>
                            <th rowspan="2">Основание переноса срока</th>
                            <th rowspan="2">Причина переноса срока</th>
                            <th rowspan="2">Отметка о выполнении мероприятия</th>
                            <th rowspan="2">Примечание</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="centered">Фамилия </th>
                            <th class="centered">Имя </th>
                            <th class="centered">Общество </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="centered">А 38-00528-0011</td>
                            <td>Страхование гражданской ответственности владельца опасного объекта за причинение вреда в результате аварии на опасном объекте.</td>
                            <td class="centered">31.12.2019</td>
                            <td class="centered">Гимадеев</td>
                            <td class="centered">Наиль</td>
                            <td class="centered">Шамильевич</td>
                            <td class="centered">31.12.2019</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Да</td>
                            <td></td>
                            <td><a href="#"><img alt="" src="assets/images/icons/trash.svg" class="trash_i"></a>
                                <a href="#"><img alt="" src="assets/images/icons/edit.svg" class="edit_i"></a></td>
                        </tr>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{$row->reg_num_opo}}</td>
                                <td>{{$row->name_event}}</td>
                                <td>{{$row->date_perfom}}</td>
                                <td>{{$row->name_f}}</td>
                                <td>{{$row->name_l}}</td>
                                <td>{{$row->name_p}}</td>
                                <td>{{$row->date_compl}}</td>
                                <td>{{$row->date_transfer}}</td>
                                <td>{{$row->reasons_post}}</td>
                                <td>{{$row->reasons_transfer}}</td>
                                <td>{{$row->check_exe}}</td>
                                <td>{{$row->note}}</td>
                                 <td class="hover_links">
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal"><img  alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
</div>
