<?php

    function my_select($sql){
    
        //打开数据库
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');
    
        //操作数据库
        $result = mysqli_query($link,$sql);
        //转成数组
        $data = mysqli_fetch_all($result,1);
    
        //关闭数据库
        mysqli_close($link);
    
        return $data;
    }


    
    function my_zsg($sql){

        //1. 连接数据库
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');

        //2. 操作数据库
        $result = mysqli_query($link,$sql);

        //3. 关闭数据库
        mysqli_close($link);

        return $result;
    }