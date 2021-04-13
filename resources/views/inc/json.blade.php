<?php

$dbconn = pg_connect("host=10.25.164.137 dbname=statick user=postgres password=Potok-DU")
or die('Не удалось соединиться: ' . pg_last_error());

$query = "SELECT cio.date as dat, cio.ip_opo as ip from calc_ip_opoi cio
where cio.from_opo = 1 and cio.date > '2021-03-05'";
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

while ($row = pg_fetch_row($result)) {
    $str = strtotime($row[0])*1000;
    /* $str = explode ('-', $str);
       $sstr = explode (' ', $str[2]);
       $y = $str[2];
     list ($str[0],$str[1],$str[2])=[$sstr[0],$str[1],$str[0]];
     $str = implode ('-', $str);
     $str = $str . ' '.$sstr[1];*/

    $arr[] =  array($str, (float)$row[1]);

    // echo 'вот массив' .$str .'<br>';
//  echo 'вот массив' .$row[1]. '<br>';
}
echo json_encode($arr);

pg_close($dbconn);
?>
