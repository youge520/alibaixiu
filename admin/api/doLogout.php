<?php 

    //开启session
    session_start();

    unset($_SESSION['userInfo']);

    //要回到登录页
    header('location:../login.html');