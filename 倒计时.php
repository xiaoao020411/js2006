<?php
    //放假时间
    $end = strtotime("2021-1-30 18:00:00");
    $seconds = $end - time();


    $response = [
        'error' =>0,
        'msg'   =>'ok',
        'data'  =>[
            'seconds'   =>$seconds
        ]
    ];
    echo json_encode($response);
    