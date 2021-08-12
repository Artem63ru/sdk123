<div>
    <div class="map_links">
        <div class="map_block">
            @foreach($rows as $row)
                @if($row->id == 1)
                    @if($min_last > 0 && $min_last <= 0.2)
                        <a href="#openModal{{$row->id}}" class="map_dot good" style="background-color: #f26161" id="{{$row->css}}" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
                    @endif
                    @if($min_last > 0.2 && $min_last <= 0.5)
                        <a href="#openModal{{$row->id}}" class="map_dot good" style="background-color: #f58b2c" id="{{$row->css}}" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
                    @endif
                    @if($min_last > 0.5 && $min_last <= 0.8)
                        <a href="#openModal{{$row->id}}" class="map_dot good" style="background-color: #ffca45;" id="{{$row->css}}" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
                    @endif
                    @if($min_last > 0.8)
                        <a href="#openModal{{$row->id}}" class="map_dot good" style="background-color: #49ce56;" id="{{$row->css}}" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
                    @endif
                @else
                    <a href="#openModal{{$row->id}}" class="map_dot good" id="{{$row->css}}" onmouseover="changeItem()" onmouseout="rechangeItem()"></a>
                @endif
            @endforeach
        </div>

{{--        <script>--}}
{{--            function changeItem() {--}}
{{--                document.getElementById('map_info').style.display = 'block';--}}
{{--            }--}}
{{--            function rechangeItem() {--}}
{{--                document.getElementById('map_info').style.display = 'none';--}}
{{--            }--}}
{{--        </script>--}}
{{--        <div class="map_bottom_blocks" id="map_info">--}}
{{--            <div class="map_info">--}}
{{--                <div class="row_block">--}}
{{--                    <table class="map_hover">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>Регион</td>--}}
{{--                            <td>Астраханская область</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Город</td>--}}
{{--                            <td>Астрахань</td>--}}
{{--                        </tr>--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</div>
