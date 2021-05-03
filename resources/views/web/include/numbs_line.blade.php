<div class="numbs_line centered">


    @foreach ($all_opo as $this_opo)
        <a href="/opo/{{$this_opo->idOPO}}/main">
    <div class="numbs_single good">{{$this_opo->descOPO}}<span>{{$this_opo->opo_to_calc1->first()->ip_opo}}</span></div>
        </a>
    @endforeach
{{--    <div class="numbs_single good active">Фонд скважин <span>0.98</span></div>--}}
{{--    <div class="numbs_single good">УКПГ-4 <span>0.98</span></div>--}}
{{--    <div class="numbs_single bad">УКПГ-6 <span>0.98</span></div>--}}
{{--    <div class="numbs_single normal">УКПГ-9 <span>0.98</span></div>--}}
{{--    <div class="numbs_single good">УПТР <span>0.98</span></div>--}}
{{--    <div class="numbs_single normal">СПТ ГКП <span>0.98</span></div>--}}
{{--    <div class="numbs_single normal">УКПГ-1 <span>0.98</span></div>--}}
{{--    <div class="numbs_single normal">УКПГ-1 <span>0.98</span></div>--}}
</div>
