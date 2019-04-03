<?php

    $email = $_POST['email'];
    $password = $_POST['password'];


    //后端写的这个接口，是为了判断账号是否登录成功
    //要操作数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //操作数据库
    $sql = "select *from users where email='$email' and password='$password'";
    $result = mysqli_query($link,$sql);
    //转成数组
    $data = mysqli_fetch_all($result,1);

    // var_dump($data);
    // return;

    //只是为了有没有查出来
    if( count($data) > 0 ){

        //保存session
        session_start();
        //一定要取下标0，一定要取下标，一定要取下标0
        $_SESSION['userInfo'] = $data[0];

        //登录成功
        echo '{ "code":10000, "msg":"ok" }';

    }else{

        //账号或密码错误
        echo '{ "code":10001, "msg":"fail" }';
    }