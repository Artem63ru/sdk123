{{--ТУТ НАПИСАН КОНТЕНТ, КОТОРЫЙ ВСПЫЛВАЕТ--}}
<span id="razd_1_1">11</span>
<script>
    document.addEventListener('DOMContentLoaded', function (){
        var tooltip_content=document.getElementById('razd_1_1');
        var tooltip=new Tooltip(tooltip_content, 'razd_1_1_tooltip', "r1_label");
    })
</script>

{{--А ТУТ ОСНОВНОЙ КОНТЕНТ СТРАНИЦЫ--}}
<div style="display: inline-block; width: 4%;">
    <div style="width: 90%" class="tab">
        <input type="radio" id="r1" name="tab_group" checked>
        <label for="r1" class="tab_title razd_col_tab" id="r1_label">Раздел 1.1</label>
        <section class="tab_content" >

            <div style="margin-top: 15px; margin-bottom: 15px" class="bat_add"><a href={{'/docs/tab11/new'}}>Добавить запись</a></div>

            <div style="margin-top: 0px" class="inside_tab_padding plan_new">
                <div class="row_block plan_new plan1">
                    <table style="width: 100%; text-align: center">
                        <thead>
                        <tr>
                            <th>Регистрационный номер ОПО</th>
                            <th>Номер полиса</th>
                            <th>Срок действия полиса</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table11 as $row)
                        <tr>
                            <td>{{$row->num_opo}}</td>
                            <td>{{$row->num_polis}}</td>
                            <td>{{$row->time}}</td>

                            <td class="hover_links">
                                <a href = 'tab11/delete/{{ $row->id }}'><img click="delete({{ $row->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                <a href = 'tab11/edit/{{ $row->id }}'><img click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
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
