<?php 

    //开启session
    session_start();

    $res = $_SESSION['userInfo'];

    //把登录的用户信息转成JSON
    echo json_encode($res);