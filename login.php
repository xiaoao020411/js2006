<?php
    include "pdo.php";

    $pdo = getPdo();

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    
    //根据用户名查询用户信息
    $sql = "select * from p_users where user_name='$user_name'";
    // echo $sql;exit;
    $res = $pdo->query($sql);
    $data = $res->fetch(PDO::FETCH_ASSOC);
    $hash = $data['password'];
    
    session_start();
    $_SESSION['user_name'] = $value;
    
    if(password_verify($password,"$hash")){
        
        
        echo "登陆成功";
    }else{
        echo "登录失败";
    }
    
?>