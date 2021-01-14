<?php
    include "pdo.php";

    $pdo = getPdo();
    
    $tian = $_GET['tian'];

    $url = 'https://devapi.qweather.com/v7/weather/now?location='.$tian.'&key=8fe30e0a6d5a49928dda4e399d37fd1c';
    $str = file_get_contents($url);
    $result = gzdecode($str);
    echo $result;