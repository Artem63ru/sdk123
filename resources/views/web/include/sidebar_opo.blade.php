<style>
    .progress {
        height: 1rem;
        line-height: 0;
        font-size: .675rem;
        background-color: #e9ecef;
        border-radius: .25rem
    }

    .progress, .progress-bar {
        display: flex;
        overflow: hidden
    }

    .progress-bar {
        flex-direction: column;
        justify-content: center;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        background-color: #3490dc;
        transition: width .6s ease
    }

    .bg-warning {
        background-color: #f45e1c !important
    }

    .bg-danger {
        background-color: #ea5757 !important
    }

    .bg-success {
        background-color: #49ce56 !important
    }

    .bg-risk {
        background-color: #ffb948 !important
    }

    @media (prefers-reduced-motion: reduce) {
        .progress-bar {
            transition: none
        }

    }
</style>
<div class="sidebar">
    <div class="inside_sidebar">

        <div class="sidebar_top">
            <div class="sidebar_top_single main rounded white_bg">
                <a href="/">
                    <div class="sidebar_top_single info">
                        <div class="class_rate good">1</div>
                        <div class="class_name">
                            <p class="bold blue_text">ПАО Газпром</p>
                            <p class="grey_text">ПАО "Газпром автоматизация"</p>
                        </div>
                    </div>
                    <div class="more_arrow"><img alt="Далее" src="{{asset('assets/images/icons/arrow_right.svg')}}"
                                                 class="more_arrow_icon"></div>
                </a>
            </div>
            <div class="sidebar_top_single main rounded white_bg">
                <a href="index.html#">
                    <div class="sidebar_top_single info">
                        <div class="class_rate good">1</div>
                        <div class="class_name">
                            <p class="bold blue_text">ГД Астрахань</p>
                            <p class="grey_text">ООО "Газпром добыча Астрахань"</p>
                        </div>
                    </div>
                    <div class="more_arrow"><img alt="Далее" src="{{asset('assets/images/icons/arrow_right.svg')}}"
                                                 class="more_arrow_icon"></div>
                </a>
            </div>
        </div>
        <div class="sidebar_bottom rounded">


            @foreach ($opo as $opo_val)
                @if ($id == $opo_val->idOPO )
                          <div class="sidebar_bottom_single active">
                @else
                          <div class="sidebar_bottom_single">
                @endif

                        <div class="clear">
                            <div class="single_fond_name rounded">
                                <a class="light_blue_text" href="/opo/{{$opo_val->idOPO}}">
                               {{$opo_val->descOPO}}
                                </a>
                                <a href="/opo/{{$opo_val->idOPO}}/plan"><img alt="" src="{{asset('assets/images/icons/settings.svg')}}"></a>
                                <p class="grey_text">ООО "Газпром добыча Астрахань"</p>


                            </div>
                            <div class="single_fond_rate clear">

                                <p class="bold dark_grey_text clear">{{ $ip_opo=$opo_val->opo_to_calc1->first()->ip_opo}}</p>

                                <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}"
                                     class="rate_icon clear">
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        {{--                        <div class="rate_line"></div>--}}

                        <div class="progress">
                            <div class="progress-bar
                    @if ($ip_opo<=0.2)
                                    bg-danger"
                                 @elseif  ($ip_opo<=0.5 && $ip_opo>0.2 )
                                 bg-warning
                            "
                            @elseif  ($ip_opo<=0.8 && $ip_opo>0.5 )
                                bg-risk"
                            @elseif  ($ip_opo<=1 && $ip_opo>0.8 )
                                bg-success"
                            @endif
                            role="progressbar" style="width: {{$ip_opo*100}}%" aria-valuenow="0.3" aria-valuemin="0"
                            aria-valuemax="1">
                        </div>
                </div>

        </div>
        @endforeach
    </div>

</div>
</div>