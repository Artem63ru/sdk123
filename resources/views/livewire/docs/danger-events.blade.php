<div>
    <div class="doc_header">
        <table>
            <tbody>
            <tr>
                <td><img alt="" src="assets/images/icons/search.svg"></td>
                <td><input type="text" id="" placeholder=""></td>
                <td><select wire:model="search" >
                        <option value="" >Выбрать все...</option>
                        @foreach (App\Models\Type_obj::all() as $value)
                            <option value="{{$value->type_id}}">{{ $value->type_name }}</option>
                        @endforeach
                    </select></td>
                <td><select id=""><option select>Элемент ОПО</option><option>2</option><option>3</option></select></td>
                <td><select id=""><option select>Манессман</option><option>2</option><option>3</option></select></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tabs razd_col_tab no_border">
        <div class="no_tab_table scene_table">



            <table class="plan_table order-count">
                <thead>
                <tr class="nohover">
                    <th>Наименование опасного события</th>
                    <th>Тип объекта</th>
                    <th>Тип проекта</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rows as $row)
                    <tr class="order">
{{--                        <td>{{$row->id}}</td>--}}
                        <td class="plus">{{$row->matrix_to_events->name}}</td>
                        <td>{{$row->matrix_to_type->type_name}}</td>
                         <td>{{$row->from_wells_project}}</td>
                          <td>
                            <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                            <a href="#openModal"><img wire:click="edit({{ $row->id }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                        </td>
                    </tr>
                    <!-- Начало вложенной таблицы -->
                    <tr class="order_item">
                        <td colspan="3">
                            <table class="plan_table">
                                <thead>
                                <tr class="nohover">
                                    <th>Наименование параметра</th>
                                    <th>Наименование</th>
                                    <th>Коэф-т</th>
                                    <th>Триггер</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($row->event_to_param as $param)
                                <tr class="">
                                    <td>{{$param->events_param->asutp_name}}</td>
                                    <td>{{$param->events_param->full_name}}</td>
                                    <td>{{$param->koef}}</td>
                                    <td><label class="switch switch-sm"><input type="checkbox" {!! $param->triger ? 'checked' : '' !!}><span></span></label></td>
                                    <td><a href="#"><img alt="" src="assets/images/icons/trash.svg" class="trash_i"></a></td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- // Конец вложенной таблицы -->
                @endforeach



                </tbody>
            </table>



            <div class="table_use">
                <table>
                    <tbody>
                    <tr>
                        <td><p>Всего записей: {{$rows->count()}}</p><img alt="" src="{{asset('assets/images/icons/close.svg')}}"></td>
{{--                        <td><button id="" class="delete">Удалить выбранные <img alt="" src="assets/images/icons/close.svg"></button>--}}
{{--                            <button id="" class="cancel">Отмена</button></td>--}}
                        <td><button id="" class="create">Добавить <img alt="" src="{{asset('assets/images/icons/dot.svg')}}"></button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        $('.plus').click(function() {
            $(this).parents('.order').nextUntil(".order",'.order_item').toggle();
        });
    </script>
</div>
