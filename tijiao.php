<?php

    include "pdo.php";

    $pdo = getPdo();

    $user_name = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    
    $sql = "select * from p_users where user_name='{$user_name}'";

    $res = $pdo->query($sql);
    $record = $res->fetch(PDO::FETCH_ASSOC);
    if($record)
    {
        $response = [
            'errno' => 400010,      
            'msg'   => "用户名已存在"
        ];
        die( json_encode($response));
    }

    $sql = "select * from p_users where mobile='{$mobile}'";
    $res = $pdo->query($sql);
    $record = $res->fetch(PDO::FETCH_ASSOC);
    if($record)
    {
        $response = [
            'errno' => 400012,     
            'msg'   => "手机号已存在"
        ];
        die( json_encode($response));
    }


    $sql = "select * from p_users where email='{$email}'";

    $res = $pdo->query($sql);
    $record = $res->fetch(PDO::FETCH_ASSOC);
    if($record)
    {
        $response = [
            'errno' => 400011,      
            'msg'   => "Email已存在"
        ];
        die( json_encode($response));
    }

    if($pass1 != $pass2)
    {
        $response = [
            'errno' => 400008,      
            'msg'   => "两次输入的密码不一致"
        ];
        die( json_encode($response));
    }
    if(strlen($pass1)<6){
        $response = [
            'errno' => 400009,      
            'msg'   => "密码长度不够"
        ];
        die( json_encode($response));
    }
    
    $password = password_hash($pass1,PASSWORD_BCRYPT);
    $sql = "insert into p_users (`user_name`,`email`,`mobile`,`password`)
 values ('{$user_name}','{$email}','{$mobile}','{$password}')";
    $pdo->exec($sql);       
    $id = $pdo->lastInsertId();
    if($id>0){  
        $response = [
            'errno' => 0,
            'msg'   => 'ok'
        ];
    }else{
        $response = [
            'errno' => 500008,
            'msg'   => '注册失败，请重试'
        ];
    }

    echo json_encode($response);
