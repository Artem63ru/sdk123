<div>
    @foreach($rows as $row)
    <div id="openModal{{$row->id}}" class="modal">
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
                            <td>{{$row->place}}</td>
                        </tr>
                        <tr>
                            <td>Сокращение</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>ДО</td>
                            <td>{{$row->full_name}}</td>
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
    @endforeach
</div>
