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
                                @if ($row->name=='ГД Астрахань')
                                <p class="bold dark_grey_text inline_block" id="min_ip_main"></p>

                                <input alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear v" id="good" type="hidden">
                                <input alt="Показатель" src="{{asset('assets/images/icons/rate/bad.svg')}}" class="rate_icon clear v" id="bad" type="hidden">
                                <p class="good inline_block bordered" id="text_work"></p>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="link_td centered"><a href="/opo/1" class="centered">Перейти к ДО</a></td>
                            @endif
                        </tr>
{{--                        скрипт ввода значения минимального ИП ОПО по Астрахани--}}
                        <script>
                            $(document).ready(function (){
                                $.ajax({
                                    url:"/min_opo",
                                    type:"GET",
                                    success:function(data)
                                    {
                                        $('#min_ip_main').text(data['min_last'])
                                        if (data['check'] == 1){
                                            document.getElementById('good').type="image"
                                            document.getElementById('good').style.maxHeight="15px"
                                            document.getElementById('bad').type="hidden"
                                        } if (data['check'] == 0) {
                                            document.getElementById('good').type="hidden"
                                            document.getElementById('bad').type="image"
                                            document.getElementById('bad').style.maxHeight="15px"
                                        } else {
                                            document.getElementById('good').type="hidden"
                                            document.getElementById('bad').type="hidden"
                                        }
                                        if (data['min_last'] > 0){
                                            $('#text_work').text('Высокий риск аварии')
                                        } if (data['min_last'] > 0.2){
                                            $('#text_work').text('Средний риск аварии')
                                        } if (data['min_last'] > 0.5){
                                        $('#text_work').text('Предпосылка к инциденту')
                                        } if (data['min_last'] > 0.8) {
                                        $('#text_work').text('Работает штатно')
                                        }
                                    }
                                })
                            })
                        </script>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
