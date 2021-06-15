

<div>
{{--    <div class="tech_block_search">--}}
{{--        <p class="bold blue_text">Элементы ОПО</p>--}}
{{--        <form> <input wire:model="search" type="text" placeholder="Элемент ОПО"/></form>--}}
{{--    </div>--}}

    <label for="from">From</label>
    <input text wire:model="search"  id="from" name="from">

    <label for="to">to</label>
    <input id="to" name="to">

    <table>
        <tbody>
        <tr>

            <td>    <div id="app" class="top_table">





                </div>
            </td>
            <td> <input text wire:model="search" id="from" style="min-width: 350px" ></td>
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


        <table class="table">
            <thead>
            <tr>
                <th>   Name  </th>
                <th>   Email  </th>
                <th>   Email  </th>
                <th>   Delete  </th>
                <th>   Edit  </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->ip_opo }}</td>
                    <td>{{ $user->date }}</td>
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


            </div>
        </div>
    </div>


</div>


