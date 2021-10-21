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
                    @if ($elem->idObj == $id_obj)
                        <input type='checkbox' name='checkbox-accordion' checked>
                    @else
                        <input type='checkbox' name='checkbox-accordion'>
                    @endif
                @else
                    <input type='checkbox' name='checkbox-accordion'>
                @endif
                 <div class="accordion__header">
                    <a href="/opo/{{$id_opo}}/elem/{{$elem->idObj}}"> {{$elem->nameObj}}</a>
                </div>

                <div class="accordion__content">
                @foreach ($elem->obj_to_type->type_to_tb as $tb)
                    @if(isset($apk_info[$elem->idObj][$tb->idOTO]))
                     <a style="color: red" href="/opo/{{$id_opo}}/elem/{{$elem->idObj}}/tb/{{$tb->idOTO}}">{{$tb->descOTO}}</a>
                    @else
                     <a href="/opo/{{$id_opo}}/elem/{{$elem->idObj}}/tb/{{$tb->idOTO}}">{{$tb->descOTO}}</a>
                    @endif
                @endforeach
                </div>
            </label>
        @endforeach
</div>


</div>

</div>
