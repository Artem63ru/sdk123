<div>
    <div class="content">
        <div class="map_bottom fond_map centered">
            <div class="high_risk risk_color"><span></span> Высокий риск аварии</div>
            <div class="middle_risk risk_color"><span></span> Средний риск аварии</div>
            <div class="low_risk risk_color"><span></span> Предпосылка к инциденту</div>
            <div class="no_risk risk_color"><span></span> Штатно</div>
            <div class="bad_info_risk risk_color"><span></span> Недостоверные данные </div>
            <div class="repair_risk risk_color"><span></span> Ремонтные работы </div>
        </div>

        <div class="top_table">
            <div class="table_head_block">
                <img alt="" src="assets/images/t_left.svg" class="table_left_corner">
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
                            <h3>Участок комплексной<br/>подготовки газа №4</h3>
                            <a onclick="clearStorage()" href="/opo/6/main">Общие сведения</a>
                            <script>
                                function clearStorage() {
                                    localStorage.removeItem('active');
                                    localStorage.removeItem('active_mini');
                                }
                            </script>
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


        <div class="new_pages_content">
            <div class="row_block">
                <div class="block_rate {{$this->colors[0][0]}}">
                    <h5>Блок входных манифольдов</h5>
                    <p>{{$this->colors[0][1]}}</p>
                </div>
                <div class="block_rate {{$this->colors[1][0]}}">
                    <h5>Контрольный сепаратор</h5>
                    <p>{{$this->colors[1][1]}}о</p>
                </div>
                <div class="block_rate {{$this->colors[2][0]}}">
                    <h5>Технологическая насосная</h5>
                    <p>{{$this->colors[2][1]}}</p>
                </div>

                <img alt="" src="{{asset('assets/images/arrow_svg.svg')}}" class="trub_arrow">
            </div>

            <div class="row_block">
                <div class="block_rate {{$this->colors[3][0]}}">
                    <h5>Операторная</h5>
                    <p>{{$this->colors[3][1]}}</p>
                </div>
                <div class="block_rate {{$this->colors[4][0]}}">
                    <h5>Факельный сепаратор</h5>
                    <p>{{$this->colors[4][1]}}</p>
                </div>
                <div class="block_rate {{$this->colors[5][0]}}">
                    <h5>Трубопроводы очищенного газа</h5>
                    <p>{{$this->colors[5][1]}}</p>
                </div>
            </div>

            <div class="row_block mobl_marg">
                <div class="block_rate {{$this->colors[8][0]}}">
                    <h5>Установка изготовления ингибитора коррозии</h5>
                    <p>{{$this->colors[8][1]}}</p>
                </div>
                <div class="block_rate {{$this->colors[6][0]}}">
                    <h5>Блок нагрева теплоносителя</h5>
                    <p>{{$this->colors[6][1]}}</p>
                </div>
                <div class="block_rate {{$this->colors[7][0]}}">
                    <h5>Повысительная пожарная насосная</h5>
                    <p>{{$this->colors[7][1]}}</p>
                </div>
                <div class="block_rate only_mobile">
                </div>
            </div>

        </div>
    </div>
</div>

