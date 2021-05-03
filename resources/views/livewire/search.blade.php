<div>
    <input wire:model="searchTerm" type="text" placeholder="Search users..."/>

    <ul>
{{$id_opo}}
        @foreach($users as $user)
            <li>{{ $user->nameObj }}</li>

                @foreach ($user->obj_to_type->type_to_tb as $tb)
                    <li>  <a href="/opo/{{$id_opo}}/elem/{{$user->idObj}}/tb/{{$tb->idOTO}}">{{$tb->descOTO}}</a></li>
                @endforeach

        @endforeach
    </ul>
</div>
