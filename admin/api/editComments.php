<?php 

    //先接收提交过来的参数
    $status = $_POST['status'];
    $ids = $_POST['ids'];

    //现在不要用我们之前封装的select

    //1. 连接数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //2. 操作数据库
    $sql = "update comments set status ='$status' where id in ($ids)";
    $result = mysqli_query($link,$sql);
    //3. 关闭数据库
    mysqli_close($link);

    if($result){

        echo '{ "code":10000, "msg":"ok" }';

    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }
    