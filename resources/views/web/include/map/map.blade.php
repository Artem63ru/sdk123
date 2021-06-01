<script>
    mapPage=true;
</script>

<div class="content map_content">
{{--    <p style="text-align: center; font-size: 42px;color: #1d68a7;" class="bold blue_text">Ситуационная карта ПАО Газпром</p>--}}
{{--    <p  class="bold ">Ситуационная карта ПАО Газпром</p>--}}
    <div class="map_bottom centered">

        <div class="high_risk risk_color"><span></span> Высокий риск аварии (s0.2)</div>
        <div class="middle_risk risk_color"><span></span> Средний риск аварии (s0.5)</div>
        <div class="low_risk risk_color"><span></span> Предпосылка к инциденту (s0.8)</div>
        <div class="no_risk risk_color"><span></span> Штатно (s1)</div>
        <div class="bad_info_risk risk_color"><span></span> Недостоверные данные </div>

    </div>

    @livewire('map-gda')
    @livewire('show-gda')


</div>