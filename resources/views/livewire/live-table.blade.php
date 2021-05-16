{{--<div class="doc_header">--}}
{{--    <table>--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <td><img alt="" src="{{asset('assets/images/icons/search.svg')}}"></td>--}}
{{--            <td><input type="text" id="" placeholder=""></td>--}}
{{--            <td><select id="">--}}
{{--                    <option disabled>Select Status...</option>--}}
{{--                    <option>Объект ОПО</option>--}}
{{--                    <option>2</option>--}}
{{--                    <option>3</option>--}}
{{--                </select></td>--}}
{{--            <td> <form><select wire:model="filters" id="filter-status">--}}
{{--                    <option value="" disabled>Select Status...</option>--}}
{{--                    @foreach (App\User::all('name') as $value)--}}
{{--                        <option value="{{$value->id}}">{{ $value->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select> </form></td>--}}
{{--            <td><select id=""><option select>Манессман</option><option>2</option><option>3</option></select></td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

{{--<div>--}}
<div class="tech_block_search">
    <p class="bold blue_text">Элементы ОПО</p>
    <form> <input wire:model="search" type="text" placeholder="Элемент ОПО"/></form>
</div>

    <div class="row">

        @if ($users->count())
            <table class="table">
                <thead>
                <tr>
                    <th>
                        <a wire:click.prevent="sortBy('name')" role="button" href="#">
                            Name
{{--                            @include('includes.sort-icon', ['field' => 'name'])--}}
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('email')" role="button" href="#">
                            Email
{{--                            @include('includes.sort-icon', ['field' => 'email'])--}}
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('surname')" role="button" href="#">
                            Address
{{--                            @include('includes.sort-icon', ['field' => 'address'])--}}
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('middle_name')" role="button" href="#">
                            Age
{{--                            @include('includes.sort-icon', ['field' => 'age'])--}}
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                            Created at
{{--                            @include('includes.sort-icon', ['field' => 'created_at'])--}}
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
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->middle_name }}</td>
                        <td>{{ $user->created_at->format('m-d-Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-dark">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                Your query returned zero results.
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col">
{{--            {{ $users->links() }}--}}
        </div>
    </div>
</div>
