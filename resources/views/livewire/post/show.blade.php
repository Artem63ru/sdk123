






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


        <table class="table">
            <thead>
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Name
{{--                                                    @include('includes.sort-icon', ['field' => 'name'])--}}
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('email')" role="button" href="#">
                        Email
{{--                                                    @include('includes.sort-icon', ['field' => 'email'])--}}
                    </a>
                </th>

                <th>
                    Delete
                </th>
                <th>
                    Edit
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->id }}</td>
{{--                    <td>{{ $user->surname }}</td>--}}
{{--                    <td>{{ $user->middle_name }}</td>--}}
{{--                    <td>{{ $user->created_at->format('m-d-Y') }}</td>--}}
                    <td>
                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-dark" wire:click="edit({{ $user->id }})">
                            Edit
                        </button>
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>
    {{ $events->links() }}

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit Transaction</x-slot>



            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.primary>

                    <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

</div>
