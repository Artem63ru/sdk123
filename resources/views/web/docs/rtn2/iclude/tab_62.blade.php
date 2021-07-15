<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r62" name="tab_group">
        <label for="r62" class="tab_title razd_col_tab">Раздел<br>6.2</label>
        <section class="tab_content">
            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab62/new'}}>Добавить запись</a></div>
            <div class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan62">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Наименование здания/сооружения, входящего в состав ОПО</th>
                            <th>Год ввода в эксплуатацию здания, эксплуатируемого на ОПО</th>
                            <th>Дата окончания реконструкции здания (при наличии)</th>
                            <th>Дата окончания капитального ремонта (при наличии)</th>
                            <th>Дата следующей экспертизы промышленной безопасности (при наличии)</th>
                            <th>Дата проведения экспертизы промышленной безопасности (при наличии)</th>
                            <th>Вывод о соответствии объекта требованиям промышленной безопасности </th>
                            <th>Если выбрано "Не в полной мере соответствует", то указать процент выполненных мероприятий из назначенных</th>
                            <th>Файл, содержащий информацию о выполненных мероприятиях или информацию по выводу здания из эксплуатации </th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table62 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->year_exp}}</td>
                            <td>{{$row->date_reconstruction}}</td>
                            <td>{{$row->date_repair}}</td>
                            <td>{{$row->date_next_check}}</td>
                            <td>{{$row->date_check}}</td>
                            <td>{{$row->result_check}}</td>
                            <td>{{$row->percent_event}}</td>
                            <td>{{$row->file}}</td>

                            <td class="hover_links">
                                <a href="tab62/delete/{{ $row->id }}"><img  alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href="tab62/edit/{{ $row->id }}"><img  alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
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
