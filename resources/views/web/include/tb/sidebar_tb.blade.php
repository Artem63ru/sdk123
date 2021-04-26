<div class="sidebar">
    <div class="inside_sidebar">
        <div class="sidebar_top">
            <div class="sidebar_top_single main rounded white_bg">
                <a href="#">
                    <div class="sidebar_top_single info">
                        <div class="class_rate good">1</div>
                        <div class="class_name">
                            <p class="bold blue_text">ПАО Газпром</p>
                            <p class="grey_text">ПАО "Газпром автоматизация"</p>
                        </div>
                    </div>
                    <div class="more_arrow"><img alt="Далее" src="{{asset('assets/images/icons/arrow_right.svg')}}" class="more_arrow_icon"></div>
                </a>
            </div>
            <div class="sidebar_top_single main rounded white_bg">
                <a href="#">
                    <div class="sidebar_top_single info">
                        <div class="class_rate good">1</div>
                        <div class="class_name">
                            <p class="bold blue_text">ГД Астрахань</p>
                            <p class="grey_text">ООО "Газпром добыча Астрахань"</p>
                        </div>
                    </div>
                    <div class="more_arrow"><img alt="Далее" src="{{asset('assets/images/icons/arrow_right.svg')}}" class="more_arrow_icon"></div>
                </a>
            </div>
        </div>
        <div class="sidebar_bottom rounded">

            <div class="sidebar_bottom_single">
                <a href="/opo/{{$ver_opo->idOPO}}">
                    <div class="clear">
                        <div class="single_fond_name rounded">
                            <p class="light_blue_text bold">{{$ver_opo->descOPO}}</p>
                            <p class="grey_text">ООО "Газпром добыча Астрахань"</p>
                        </div>
                        <div class="single_fond_rate clear">
                            <p class="bold dark_grey_text clear">{{$ver_opo->opo_to_calc1->first()->ip_opo}}</p>
                            <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="divide_line"></div>
                </a>
            </div>
            <div class="tech_block_search">
                <p class="bold blue_text">Элементы ОПО</p>
                <form><input type="text" name="search" required placeholder=""></form>
            </div>
            <div class="clearfix"></div>

            <div class="blocks_list">


                <div>
                    @foreach ($elems_opo as $elem)
                    <label class="accordion">
                        @if ($elem->idObj == $id_obj)
                        <input type='checkbox' name='checkbox-accordion' checked>
                        @else
                        <input type='checkbox' name='checkbox-accordion'>
                        @endif

                        <div class="accordion__header">{{$elem->nameObj}}</div>

                        <div class="accordion__content">
                            @foreach ($elem->obj_to_type->type_to_tb as $tb)
                                  <a href="/opo/{{$ver_opo->idOPO}}/elem/{{$elem->idObj}}/tb/{{$tb->idOTO}}">{{$tb->descOTO}}</a>
                            @endforeach
                        </div>

                    </label>
                    @endforeach

                        <label class="accordion">
                            <input type='checkbox' name='checkbox-accordion' checked>
                            <div class="accordion__header">789456</div>

                            <div class="accordion__content">

                                    <a href="">2222222</a>
                                    <a href="">2222222</a>
                                    <a href="">2222222</a>
                                    <a href="">2222222</a>

                            </div>

                        </label>

                </div>


            </div>



        </div>
    </div>
</div>
