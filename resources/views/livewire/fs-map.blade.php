<div>
    {{-- Be like water. --}}
    <div class="content map_content fond_content">

        <div class="map_bottom fond_map centered">
            <div class="high_risk risk_color"><span></span> Высокий риск аварии</div>
            <div class="middle_risk risk_color"><span></span> Средний риск аварии</div>
            <div class="low_risk risk_color"><span></span> Предпосылка к инциденту</div>
            <div class="no_risk risk_color"><span></span> Штатно</div>
            <div class="bad_info_risk risk_color"><span></span> Недостоверные данные</div>
            <div class="repair_risk risk_color"><span></span> Ремонтные работы</div>
        </div>


        <div class="map_links fond_map_links">
            <div class="fond_map_center">
                <div class="map_block fond_map_block">
                    <div class="m_move_adapt">
                        <div class="m_move">

                            @foreach ($objs as $obj)
                                <a href="#openModal" class="map_dot
                            @if ($obj->status == '50')
                                @if ($obj->elem_to_calc->first()->status_ip_el == '1') good
                                  @elseif ($obj->elem_to_calc->first()->status_ip_el == '2') normal
                                  @elseif ($obj->elem_to_calc->first()->status_ip_el == '3') critical
                                @else bad
                                @endif
                                @else repair
                            @endif
                                        " id="id{{$obj->idObj}}" wire:click="Show({{ $obj->idObj }})"></a>
                                {{--                            <a href="#openModal" class="map_dot" style=" background: #{{$obj->elem_to_calc->first()->calc_elem_to_status->color}}" id="id{{$obj->idObj}} wire:click="Show({{ $obj->idObj }})"></a>--}}
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="fond_info">
                    <table>
                        <tr>
                            <td>
                                <p>Ситуационный план ОПО</p>
                                <h3>Фонд Скважин</h3><br/>
                                <a onclick="clearStorage()" href="/opo/1/main" >Общие сведения</a>
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
        </div>

        <div id="openModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="#close" title="Close" class="close">×</a>
                    </div>
                    <div class="modal-body">
                        <table class="modal_table map_hover">
                            <tbody>
                            <tr>
                                <td>ОПО</td>
                                <td>Фонд Скважин</td>
                            </tr>
                            <tr>
                                <td>Элемент ОПО</td>
                                <td> {{$this->name}}</td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td class="{{$this->color_status}}">{{$this->status}}</td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                @if ($this->color_status == 'good')
                                    <td colspan="2" class="link_td centered">
                                        <a href="/opo/1/elem/{{$this->elem_id}}">Перейти к элементу</a>
                                    </td>
                                @else
{{--                                    <td colspan="2" class="link_td centered">--}}
{{--                                        <a onclick="return false" href="/opo/1/elem/{{$this->elem_id}}">Перейти к--}}
{{--                                            элементу</a>--}}
{{--                                    </td>--}}
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
