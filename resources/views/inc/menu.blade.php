<?php
$action = True; //---------- переменна начала меню
//----Формирование главного меню-------------
$dbconn = pg_connect("host=10.25.164.137 dbname=statick user=postgres password=Potok-DU")
or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
$query = 'SELECT opo.descr as descr, opo.ip as ip, opo."idOPO", ro2."nameObj" as obj from (select try."descOPO" as descr, try.ip_opo as ip, try."idOPO"  from (SELECT ro."idOPO", ro."descOPO", cio.ip_opo from ref_opo ro
			left join calc_ip_opoi cio on ro."idOPO" = cio.from_opo
			ORDER BY cio.id DESC limit 9) as try
			Order by try."idOPO") as opo
left join ref_obj ro2 on ro2."idOPO" = opo."idOPO" and ro2."InUse" = 1
order by opo.descr, ro2."nameObj"';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

$array = array();
$old_opo = ''; //необходимо для разделения опо
while ($row = pg_fetch_assoc($result)) {

    $ip = $row['ip'];
    $opo = $row['descr'];
    $elem_opo = $row['obj'];

// if ($current_url == $file) echo '<li class="activ"><a href="/'.$file.'">'.$title.'</a></li>';
//
// else


    if ($action)
    {
        echo '<li id="'.$opo.'" class="active"><a href="/opo/'.$opo.'">'.$opo.'</a><span class="jquery-accordion-menu-label">'.$ip.'</span>';
        echo "\n";
        echo' <ul class="submenu">';
        echo "\n";
        echo '<li><a href="/element/'.$elem_opo.'">'.$elem_opo.'</a></li>';
        echo "\n";
        $action = False;
        $old_opo = $opo;
    }
    else {
        if ($old_opo == $opo)
        {

            echo '<li><a href="/element/'.$elem_opo.'">'.$elem_opo.'</a></li>';
            echo "\n";
        }
        else
        {       echo '</ul> </li>';
            echo "\n";
            echo '<li><a href="/opo/'.$opo.'">'.$opo.'</a><span class="jquery-accordion-menu-label">'.$ip.'</span>';
            echo "\n";
            echo' <ul class="submenu">';
            echo "\n";
            echo '<li><a href="/element/'.$elem_opo.'">'.$elem_opo.'</a></li>';
            echo "\n";
            $old_opo = $opo;
        }
    }


}
echo '</ul> </li>';
pg_close($dbconn);

?>
