<div>

    <div class="tech_block_search">
        <p class="bold blue_text">Элементы ОПО</p>
         <form> <input wire:model="searchTerm" type="text" placeholder="Элемент ОПО"/></form>
    </div>
    <div class="clearfix">       </div>




    <div class="blocks_list">


        <div>
        @foreach($users as $elem)
            <label class="accordion">
                @if (isset($id_obj))
                    @if ($elem->buildingGUID == $id_obj)
                        <input type='checkbox' name='checkbox-accordion' checked>
                    @else
                        <input type='checkbox' name='checkbox-accordion'>
                    @endif
                @else
                    <input type='checkbox' name='checkbox-accordion'>
                @endif
                 <div class="accordion__header">
                    <a href="/opo/{{$id_opo}}/elem/{{$elem->buildingGUID}}"> {{$elem->nameObj}}</a>
                </div>

                <div class="accordion__content">
                @foreach ($elem->obj_to_type->type_to_tb as $tb)
                     <a href="/opo/{{$id_opo}}/elem/{{$elem->buildingGUID}}/tb/{{$tb->idOTO}}">{{$tb->descOTO}}</a>
                @endforeach
                </div>
            </label>
        @endforeach
</div>


</div>

</div>
