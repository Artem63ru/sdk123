<div>
    <div class="content">
            <div class="top_table">
                <div class="table_head_block">
                    <img alt="" src="{{asset('assets/images/t_left.svg')}}" class="table_left_corner">
                    <table>
                        <tbody>
                        <tr>
                            <td class="td_date ps_el">Дата</td>
                            <td class="td_status ps_el">Статус</td>
                            <td class="td_opo ps_el">ОПО</td>
                            <td class="td_element ps_el">Элемент ОПО</td>
                            <td class="td_number ps_el">Номер</td>
                            <td class="td_event ps_el">Событие</td>
                            <td class="td_btn"><a href="#">Открыть полностью</a></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="top_table_inside">
                    <table>
                        <tbody>
                        @foreach (\App\Jas::orderBy('id','DESC')->take(15)->get() as $value)
                            <tr>
                                <td class="td_date">{{date('d-m-Y h:m', strtotime($value->data))}}</td>
                                <td class="td_status">{{$value->level}}</td>
                                <td class="td_opo">{{$value->jas_to_opo->descOPO}}</td>
                                <td class="td_element">{{$value->jas_to_elem->nameObj}} (Элемен объекта ОПО {{$value->jas_to_opo->descOPO}})</td>
                                <td class="td_number">{{$value->status}}</td>
                                <td class="td_event">{{$value->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="fond_info new_pages_block">
                    <table>
                        <tr>
                            <td>
                                <p>Ситуационный план ОПО</p>
                                <h3>Парк резервуарный<br/>(промысловый)</h3>
                                <a href="/opo/9/main">Общие сведения</a>
                            </td>
                            <td class="centered">
                                <p>Текущее состояние:</p>
                                <div class="rate_fond
                                      @if ($opo->opo_to_calc1->first()->status == '1') good
                                  @elseif ($opo->opo_to_calc1->first()->status == '2') normal
                                  @elseif ($opo->opo_to_calc1->first()->status == '3') critical
                                @else bad
                                @endif
                                        ">
                                    {{$opo->opo_to_calc1->first()->ip_opo}}
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="fond_info new_pages_block ttr">
                <table>
                    <tr>
                        <td>
                            <p>Ситуационный план ОПО</p>
                            <h3>Парк резервуарный<br/>(промысловый)</h3>
                            <a href="#">Общие сведения</a>
                        </td>
                        <td class="centered">
                            <p>Текущее состояние:</p>
                            <div class="rate_fond good">
                                0,77
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="new_pages_content lot_rates">

            <div class="rate_pl rate_mid">
                <h6>Участок хранения технологических регламентов</h6>
                <div class="rate_index full_height_index">
                    <div class="block_rate w25 good"><h5>E-1X</h5></div>
                    <div class="block_rate w25 good"><h5>E-2X</h5></div>
                    <div class="block_rate w25 good"><h5>E-3X</h5></div>
                    <div class="block_rate w25 good"><h5>E-4X</h5></div>
                </div>
            </div>
            <div class="rate_pl rate_sm"><p>Операторная</p></div>
            <div class="rate_pl rate_lg">
                <h6>Участок хранения метанола</h6>
                <div class="rate_index double_height_index">
                    <div class="block_rate w14 good"><h5>E-1M</h5></div>
                    <div class="block_rate w14 good"><h5>E-2M</h5></div>
                    <div class="block_rate w14 good"><h5>E-3M</h5></div>
                    <div class="block_rate w14 good"><h5>E-4M</h5></div>
                    <div class="block_rate w14 good"><h5>E-5M</h5></div>
                    <div class="block_rate w14 good"><h5>E-6M</h5></div>
                    <div class="block_rate w14 good"><h5>E-7M</h5></div>
                    <div class="block_rate w100 good"><h5>Технологическая насосная</h5></div>
                </div>
            </div>

            <div class="rate_pl rate_lg">
                <h6>Участок хранения кислоты</h6>
                <div class="rate_index double_height_index">
                    <div class="block_rate w14 good"><h5>E-1К</h5></div>
                    <div class="block_rate w14 good"><h5>E-2К</h5></div>
                    <div class="block_rate w14 good"><h5>E-3К</h5></div>
                    <div class="block_rate w14 good"><h5>E-4К</h5></div>
                    <div class="block_rate w14 good"><h5>E-5К</h5></div>
                    <div class="block_rate w14 good"><h5>E-6К</h5></div>
                    <div class="block_rate w14 good"><h5>E-7К</h5></div>
                    <div class="block_rate w100 good"><h5>Технологическая насосная</h5></div>
                </div>
            </div>
            <div class="rate_pl rate_mid">
                <h6>Участок хранения дизельного топлива в РИК</h6>
                <div class="rate_index small_height_index">
                    <div class="block_rate w25 good"><h5>E-1Р</h5></div>
                    <div class="block_rate w25 good"><h5>E-2Р</h5></div>
                    <div class="block_rate w25 good"><h5>E-3Р</h5></div>
                    <div class="block_rate w25 good"><h5>E-4Р</h5></div>
                    <div class="block_rate w25 good"><h5>E-5Р</h5></div>
                    <div class="block_rate w25 good"><h5>E-6Р</h5></div>
                    <div class="block_rate w25 good"><h5>E-7Р</h5></div>
                    <div class="block_rate w25 good clear"><h5>0</h5></div>
                    <div class="block_rate w100 good"><h5>Технологическая насосная</h5></div>
                </div>
            </div>
            <div class="rate_pl rate_sm"><p>Склад хранения <br/>ингибитора коррозии <br/>в бочковой таре</p></div>

        </div>
        </div>
    </div>
  </div>
 </div>

