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

            @if (isset($id_obj))
            @livewire('search', ['id_opo'=>$ver_opo->idOPO, 'id_obj'=>$id_obj])
            @else
                @livewire('search', ['id_opo'=>$ver_opo->idOPO])
            @endif


        </div>
    </div>
</div>
