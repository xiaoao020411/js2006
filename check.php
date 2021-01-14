<?php

include "pdo.php";

$pdo = getPdo();

$username = $_GET['name'];
//echo $username;die;

//echo $username;

//查询数据库
$sql = "select * from p_users where user_name='{$username}' or email='{$username}' or mobile='{$username}'";
$res = $pdo->query($sql);
$data = $res->fetch(PDO::FETCH_ASSOC);
print_r($data);die;
if($data['user_name']){
    $response = [
        'errno' => 400010,      
        'msg'   => "已存在"
    ];
    die( json_encode($response));
}else{
    $response = [
        'errno' => 0,      
        'msg'   => "ok"
    ];
    
}
