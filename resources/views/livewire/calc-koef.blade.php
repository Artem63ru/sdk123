<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="tabs razd_col_tab no_border">
        <div class="no_tab_table opend">
            <table class="plan_table">
                <thead>
                <tr class="nohover">
                    <th>   Номер  </th>
                    <th>   Наименование  </th>
                    <th>   Обозначение  </th>
                    <th>   Коеф  </th>
                    <th>   ОТО  </th>

                </tr>
                </thead>
                <tbody>
                @foreach ($koefs as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->koef }}</td>
                        <td>{{ $user->from_oto }}</td>
{{--                                        <td> <a href="#"><img alt="" src="{{asset('assets/images/icons/open.svg')}}" class="open_i"></a>--}}
{{--                         <a href="#"><img wire:click="delete({{ $user->id }})" alt="" src="{{asset('assets/images/icons/trash.svg')}}" class="trash_i"></a>--}}
                        <td>  <a href="#EditModal" ><img wire:click="edit({{ $user->id }})" alt="Редактировать" src="{{asset('assets/images/icons/edit.svg')}}" class="edit_i"></a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="table_use">
            <table>
                <tbody>
                <tr>
                    <td><p>Всего записей: {{$koefs->count()}}</p><p>  </p></td>
                    {{--                    <td>{{ $events->links() }}</td>--}}
{{--                    <td><a href="#openModal"><button id="" class="create">Добавить <img alt="" src="{{asset('assets/images/icons/dot.svg')}}"></button></a></td>--}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="EditModal" class="modal">
        <div class="modal-dialog table_use">
            <div class="modal-content" style="width: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body ">
                    <h2 style="text-align: center">Изменение коеффициента</h2>
                    <form>
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>Наименование коеффициента</td>
                                <td><input type="text" readonly wire:model="name" id="title" style="min-width: 350px" /></td>
                            </tr>
                             <tr>
                                <td>Коэффициент для расчетов</td>
                                <td><input type="text" wire:model="koef" id="title" style="min-width: 350px" />
                                   <p> @error('koef') <span style="color: #e3342f !important">{{ $message }}</span> @enderror </p>
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

</div>
