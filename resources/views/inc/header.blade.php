@section('header')
<div class="header">
    <div class="logo">
        <a href="/"><img src="\logo.png" alt="ДО ГДА"></a>
    </div>

    <table class="tabjas">
        <thead>
        <tr>
            <th width="70 px;">Дата</th>
            <th width="70 px;">Статус</th>
            <th width="120 px;">ОПО</th>
            <th width="150 px;">Наименование элемента</th>
            <th width="550 px;">Событие</th>
            <th width="70 px;">Класс</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>02.01.2021 21:05:05</td>
            <td>Пришло</td>
            <td>Фонд скважин</td>
            <td>СКВ1109</td>
            <td>Разгерметизация на скважине</td>
            <td>C1</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>cell3_2</td>
            <td>cell4_2</td>
            <td>cell5_2</td>
            <td>C2</td>
        </tr>
        <tr>
            <td>cell1_3</td>
            <td>cell2_3</td>
            <td>cell3_3</td>
            <td>cell4_3</td>
            <td>cell5_3</td>
            <td>C3</td>
        </tr>
        <tr>
            <td>cell1_4</td>
            <td>cell2_4</td>
            <td>cell3_4</td>
            <td>cell4_4</td>
            <td>cell5_4</td>
            <td>C4</td>
        </tr>
        </tbody>
    </table>

    <div class="time">
        <div id="timer">Время  <?php echo (date("H:i:s"));?> </div>
        <div id="date">Дата <?php echo (date("d  F  Y "));?></div>
         <a href="{{ route('logout') }}"> <i class="large material-icons">assignment_ind</i> {{ auth()->user()->name }}</a>
    </div>
    <div class="butt">
       <a href="/php"> &#128438</a>
    </div>
    <div class="butt">
        <a href="/trend"> &#128390</a>
    </div>
    <div class="butt">
        &#128448
    </div>
    <div class="butt">
        <a href="{{ route('admin') }}"> <i class="large material-icons">build</i></a>
    </div>
     <div class="butt">
         <a href="{{ route('logout') }}"> <i class="large material-icons">cancel</i></a>
    </div>

</div>
