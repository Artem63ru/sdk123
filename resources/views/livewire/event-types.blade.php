<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="doc_header">
    <table>
        <tbody>
        <tr>
            <td> <form><select wire:model="search" >
                        <option value="" >Выбрать все...</option>
                        @foreach (App\Models\Type_obj::all() as $value)
                            <option value="{{$value->type_id}}">{{ $value->type_name }}</option>
                        @endforeach
                    </select> </form></td>

        </tr>
        </tbody>
    </table>

{{--    <a href="#openModal">    <button class="btn btn-sm btn-success">--}}
{{--            Добавить--}}
{{--        </button>--}}
{{--    </a>--}}
    </div>
    <div class="tabs razd_col_tab no_border">
        <div class="no_tab_table opend">
    <table class="plan_table">
        <thead>
        <tr class="nohover">
            <th>   Номер  </th>
            <th>   Событие  </th>

        </tr>
        </thead>
        <tbody>
        @foreach ($events as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
{{--                <td> <a href="#"><img alt="" src="{{asset('assets/images/icons/open.svg')}}" class="open_i"></a>--}}
                <td> <a href="#"><img wire:click="delete({{ $user->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                    <a href="#openModal1" ><img wire:click="edit({{ $user->id }})" alt="Редактировать" src="{{asset('assets/images/icons/edit.svg')}}" class="edit_i"></a></td>

            </tr>
        @endforeach
        </tbody>
    </table>

        </div>
        <div class="table_use">
            <table>
                <tbody>
                <tr>
                    <td><p>Всего записей: {{$events->count()}}</p><p>  </p></td>
{{--                    <td>{{ $events->links() }}</td>--}}
                    <td><a href="#openModal"><button id="" class="create">Добавить <img alt="" src="{{asset('assets/images/icons/dot.svg')}}"></button></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="openModal" class="modal">
        <div class="modal-dialog table_use">
            <div class="modal-content" style="width: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Добавить событие</h2>
                    <form wire:submit.prevent="submit">
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Наименование события</td>
                                <td><input text wire:model="name" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Тип объекта</td>
                                <td><form><select wire:model="from_type_obj" style="min-width: 350px">
                                            <option value="" >Выбрать все...</option>
                                            @foreach (App\Models\Type_obj::all() as $value)
                                                <option value="{{$value->type_id}}">{{ $value->type_name }}</option>
                                            @endforeach
                                        </select> </form></td>
                            </tr>

                            <td colspan="2" class="link_td centered"><button type="submit" class="create">
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

    <div id="openModal1" class="modal">
        <div class="modal-dialog table_use">
            <div class="modal-content" style="width: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Редактировать событие</h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Наименование события</td>
                                <td><input text wire:model="name" id="title" style="min-width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Тип объекта</td>
                                <td><form><select wire:model="from_type_obj" style="min-width: 350px">
                                            <option value="" >Выбрать все...</option>
                                            @foreach (App\Models\Type_obj::all() as $value)
                                                <option value="{{$value->type_id}}">{{ $value->type_name }}</option>
                                            @endforeach
                                        </select> </form></td>
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
