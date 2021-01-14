<?php 
  
   function tian(){
    $city=$_GET['city']; //接收城市名
 
    $url="http://wthrcdn.etouch.cn/weather_mini?city=".$city; 
    $str = file_get_contents($url);  //调用接口获得天气数据
    //这一步很重要
    $result= gzdecode($str);   //解压
    //end
    echo  $result;
 
   }
   tian();
    
  
?> 