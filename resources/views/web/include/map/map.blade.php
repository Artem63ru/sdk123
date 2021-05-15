<div class="content map_content">
    <div class="map_bottom centered">
        <div class="high_risk risk_color"><span></span> Высокий риск аварии (s0.2)</div>
        <div class="middle_risk risk_color"><span></span> Средний риск аварии (s0.5)</div>
        <div class="low_risk risk_color"><span></span> Предпосылка к инциденту (s0.8)</div>
        <div class="no_risk risk_color"><span></span> Штатно (s1)</div>
        <div class="bad_info_risk risk_color"><span></span> Недостоверные данные </div>
    </div>
    <div class="map_links">
        <div class="map_block">
            <a href="#openModal" class="map_dot corrupt" id="astrahan" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal1" class="map_dot good" id="mahachkala" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot bad" id="stavropol" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot normal" id="krasnodar" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot critical" id="krasnodar-2" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="volgograd" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="saratov" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="samara" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="orenburg" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="salavat" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="ufa" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="kuznneck" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="kazan" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="gd-spb" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="gt-spb" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="moskva-gd" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="moskva-gt" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="n-novgorod" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="uhta" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="chaicovsky" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="ekaterinburg" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="ugorsk" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="surgut" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="gd-noyabrsk" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="gd-urengoy" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="gd-yamburg" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="gd-nadym" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="tomsk" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="irkutsk" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="blagoveshensk" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
            <a href="#openModal" class="map_dot good" id="shelf" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
        </div>

        <script>
            function changeItem() {
                document.getElementById('map_info').style.display = 'block';
            }
            function rechangeItem() {
                document.getElementById('map_info').style.display = 'none';
            }
        </script>

        <div class="map_bottom_blocks" id="map_info">
            <div class="map_info">
                <div class="row_block">
                    <table class="map_hover">
                        <tbody>
                        <tr>
                            <td>Регион</td>
                            <td>Астраханская область</td>
                        </tr>
                        <tr>
                            <td>Город</td>
                            <td>Астрахань</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
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
                            <td>Регион</td>
                            <td>Астраханская область</td>
                        </tr>
                        <tr>
                            <td>Город</td>
                            <td>Астрахань</td>
                        </tr>
                        <tr>
                            <td>ДО</td>
                            <td>Газпром добыча Астрахань</td>
                        </tr>
                        <tr>
                            <td>Состояние</td>
                            <td class="sost bold">
                                <p class="bold dark_grey_text inline_block">0.98</p>
                                <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear v">
                                <p class="good inline_block bordered">Работает штатно</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="link_td centered"><a href="/opo/1" class="centered">Перейти к ДО</a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="openModal1" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body">
                    <table class="modal_table map_hover">
                        <tbody>
                        <tr>
                            <td>Регион</td>
                            <td>Дагестан</td>
                        </tr>
                        <tr>
                            <td>Город</td>
                            <td>Махачкала</td>
                        </tr>
                        <tr>
                            <td>ДО</td>
                            <td>Газпром Трансгаз Махачкала</td>
                        </tr>
                        <tr>
                            <td>Состояние</td>
                            <td class="sost bold">
                                <p class="bold dark_grey_text inline_block">0.98</p>
                                <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear v">
                                <p class="good inline_block bordered">Работает штатно</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="link_td centered">Перейти к ДО</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>