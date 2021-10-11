<div>
      <div class="doc_header">
            <table>
                <tbody>
                <tr>
                    <td style="width: 3%"><img alt="" src="{{asset('assets/images/icons/search.svg')}}"></td>
                    <td style="width: 24%; margin-left: 0px"><input wire:model="search3" type="text" placeholder=""/></td>
                    <td style="width: 40%; margin-left: 0px"><form><select wire:model="search1" >
                                <option value="" >Выбрать все...</option>
                                @foreach ($type_obj as $value)
                                    <option value="{{$value->type_id}}">{{ $value->type_name }}</option>
                                @endforeach
                            </select> </form></td>
                    @if($visible_wells == 1)
                    <td style="width: 33%"><form><select wire:model="search2" >
                                <option value="" >Любая очередь...</option>
                                    <option value="{{1}}">1 очередь</option>
                                    <option value="{{2}}">2 очередь</option>
                            </select> </form></td>
                    @endif
{{--                    <td><select id=""><option select>Элемент ОПО</option><option>2</option><option>3</option></select></td>--}}
{{--                    <td><select id=""><option select>Манессман</option><option>2</option><option>3</option></select></td>--}}
                </tr>
                </tbody>
            </table>
        </div>
        <div class="tabs razd_col_tab no_border">
            <div class="no_tab_table">
                <table class="plan_table">
                    <thead>
                    <tr class="nohover">
                        <th></th>
                        <th>Наименование<br/>параметра</th>
                        <th>Наименование<br/>регистра</th>
                        <th>Ед.<br/>изм</th>
                        <th>Мин</th>
                        <th>Макс</th>
                        <th>Коэф-т</th>
                        <th>Тип<br/>параметра</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        ?>
                    @foreach ($reglaments as $reglament)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$reglament->reglament_to_param->full_name}}</td>
                            <td>{{$reglament->reglament_to_param->asutp_name}}</td>
                            <td>{{$si[$reglament->reglament_to_param->si]}}</td>
                            <td>{{$reglament->min}}</td>
                            <td>{{$reglament->max}}</td>
                            <td>{{$reglament->koef}}</td>
                            <td>{{$type_signal[$reglament->reglament_to_param->type]}}</td>
                            <td>
                                    <a href="#"><img alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                                    <a href="#openModal"><img wire:click="edit({{ $reglament->id_teh_reglament }})" alt="" src="{{asset('assets/images/icons/edit.svg')}}" class="check_i"></a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                        ?>
                    @endforeach

                    </tbody>
                </table>
                <div class="table_use">
                    <table>
                        <tbody>
                        <tr>
                            <td><p>Всего записей: {{$reglaments->count()}}</p></td>
{{--                            <td><button id="" class="create">Добавить <img alt="" src="assets/images/icons/dot.svg"></button></td>--}}
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    <div id="openModal" class="modal">
        <div class="modal-dialog table_use">
            <div class="modal-content" style="width: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Редактировать параметр </h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Наименование параметра</td>
                                <td><input text wire:model="name" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Минимальное значение</td>
                                <td><input text wire:model="min" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Максимальное значение</td>
                                <td><input text wire:model="max" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Коэфициент</td>
                                <td><input text wire:model="koef" id="title" style="min-width: 350px" /></td>
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

