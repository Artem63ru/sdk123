
{{--<style>--}}
{{--    .btn {--}}
{{--        display: inline-block;--}}
{{--        font-weight: 400;--}}
{{--        color: #212529;--}}
{{--        text-align: center;--}}
{{--        vertical-align: middle;--}}
{{--        -webkit-user-select: none;--}}
{{--        -moz-user-select: none;--}}
{{--        -ms-user-select: none;--}}
{{--        user-select: none;--}}
{{--        background-color: transparent;--}}
{{--        border: 1px solid transparent;--}}
{{--        padding: .375rem .75rem;--}}
{{--        font-size: .9rem;--}}
{{--        line-height: 1.6;--}}
{{--        border-radius: .25rem;--}}
{{--        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out--}}
{{--    }--}}
{{--    .btn-group-sm > .btn, .btn-sm {--}}
{{--        padding: .25rem .5rem;--}}
{{--        font-size: .7875rem;--}}
{{--        line-height: 1.5;--}}
{{--        border-radius: .2rem--}}
{{--    }--}}
{{--    .btn-success {--}}
{{--        color: #fff;--}}
{{--        background-color: #38c172;--}}
{{--        border-color: #38c172--}}
{{--    }--}}

{{--    .btn-primary {--}}
{{--        color: #fff;--}}
{{--        background-color: #3490dc;--}}
{{--        border-color: #3490dc--}}
{{--    }--}}

{{--    .btn-primary {--}}
{{--        color: #fff;--}}
{{--        background-color: #3490dc;--}}
{{--        border-color: #3490dc--}}
{{--    }--}}

{{--    .btn-primary.focus, .btn-primary:focus, .btn-primary:hover {--}}
{{--        color: #fff;--}}
{{--        background-color: #227dc7;--}}
{{--        border-color: #2176bd--}}
{{--    }--}}

{{--    .btn-primary.focus, .btn-primary:focus {--}}
{{--        box-shadow: 0 0 0 .2rem rgba(82, 161, 225, .5)--}}
{{--    }--}}

{{--    .btn-primary.disabled, .btn-primary:disabled {--}}
{{--        color: #fff;--}}
{{--        background-color: #3490dc;--}}
{{--        border-color: #3490dc--}}
{{--    }--}}

{{--    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show > .btn-primary.dropdown-toggle {--}}
{{--        color: #fff;--}}
{{--        background-color: #2176bd;--}}
{{--        border-color: #1f6fb2--}}
{{--    }--}}

{{--    .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show > .btn-primary.dropdown-toggle:focus {--}}
{{--        box-shadow: 0 0 0 .2rem rgba(82, 161, 225, .5)--}}
{{--    }--}}
{{--</style>--}}





<div>
{{--    <div class="tech_block_search">--}}
{{--        <p class="bold blue_text">Элементы ОПО</p>--}}
{{--        <form> <input wire:model="search" type="text" placeholder="Элемент ОПО"/></form>--}}
{{--    </div>--}}


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
{{--        <form wire:submit.prevent="save">--}}
{{--            <div modal.dialog wire:model.defer="showEditModal">--}}

{{--                <input text wire:model="editing.title" id="title" />--}}



{{--                    <button wire:click="$set('showEditModal', false)">Cancel</button>--}}

{{--                        <button  type="submit">Save</button>--}}

{{--            </div>--}}
{{--        </form>--}}
    <a href="#openModal">    <button class="btn btn-sm btn-success">
          Добавить
        </button>
    </a>

        <table class="table">
            <thead>
            <tr>
                <th>   Name  </th>
                <th>   Email  </th>
                <th>   Delete  </th>
                <th>   Edit  </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->id }}</td>
                    <td>
                          <button class="btn btn-sm btn-primary" wire:click="delete({{ $user->id }})">
                           Delete
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" wire:click="edit({{ $user->id }})">
                            <a href="#openModal1">  Edit </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{ $events->links() }}

    <div id="openModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body">
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

                            <td colspan="2" class="link_td centered"><button type="submit" class="btn btn-primary">
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
        <div class="modal-dialog">
            <div class="modal-content" style="width: 650px">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center">Добавить событие</h2>
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

                            <td colspan="2" class="link_td centered"><button type="submit" class="btn btn-primary" wire:click.prevent="update()">
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


