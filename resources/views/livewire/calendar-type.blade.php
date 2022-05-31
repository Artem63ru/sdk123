<div>
    <div class="tabs razd_col_tab no_border">
        <div class="no_tab_table opend">
            <table class="plan_table">
                <thead>
                <tr class="nohover">
                    <th style="text-align: left; width: 25px">   Номер </th>
                    <th style="text-align: left; width: 150px">   Наименование события  </th>
                    <th style="text-align: left; width: 25px"></th>
                    <th style="text-align: left; width: 150px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($types as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="#"><img wire:click="delete({{ $user->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>
                            <a href="#EditModal"><img wire:click="edit({{ $user->id }})" alt="Редактировать" src="{{asset('assets/images/icons/edit.svg')}}" class="edit_i"></a></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="table_use">
            <table>
                <tbody>
                <tr>
                    <td><p>Количество возможных событий: {{$types->count()}}</p><p>  </p></td>
                    <td><a href="#openModal"><button id="" class="create">Добавить <img alt="" src="{{asset('assets/images/icons/dot.svg')}}"></button></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if ($show_modal)
    <div id="EditModal" class="modal" style="display: block">
        @else
            <div id="EditModal" class="modal">
        @endif
        <div class="modal-dialog table_use" style="margin-right: 900px">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Изменение наименования события</h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Номер события</td>
                                <td><input type="text" readonly wire:model="type_id" id="title" style="min-width: 350px" disabled /></td>
                            </tr>
                             <tr>
                                <td style="width: 200px">Наименование события</td>
                                <td><input type="text" wire:model="type_name" id="title" style="min-width: 350px; margin-right: 180px; margin-top: 30px" />
                                   <p> @error('types') <span style="color: #e3342f !important">{{ $message }}</span> @enderror </p>
                                </td>

                            </tr>

                            <td colspan="2" class="link_td centered">
                                <button type="submit" class="create" wire:click.prevent="update()">
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

