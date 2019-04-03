<?php

    //拿到提交的数据
    $email = $_POST['email'];
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];


    //文件
    $avatar = $_FILES['avatar'];
    //取图片名
    $name = $avatar['name'];

    //取临时路径
    $tmp = $avatar['tmp_name'];

    //把图片名转成GBK的图片名
    $gbkName = iconv('utf-8','gbk',$name);

    //准备新路径
    $path = "../../uploads/$gbkName";

    //移动临时路径到新路径
    move_uploaded_file($tmp,$path);

    //导入工具文件
    require_once "tools/doSql.php";

    $path = "../../uploads/$name";
    //准备sql语句

    if($name != ""){
        $sql = "update users set
                        slug = '$slug',
                        nickname = '$nickname',
                        bio = '$bio',
                        avatar = '$path'
                    where email = '$email'";
    }else{
        $sql = "update users set
                    slug = '$slug',
                    nickname = '$nickname',
                    bio = '$bio'
                where email = '$email'";
    }

    //执行sql语句
    $result = my_zsg($sql);

    if($result){

        //把session里的信息也修改了
        session_start();
        $_SESSION['userInfo']['slug'] = $slug;
        $_SESSION['userInfo']['nickname'] = $nickname;
        $_SESSION['userInfo']['bio'] = $bio;

        if( $name != "" )
            // 注意：这里保存的是路径！！
            $_SESSION['userInfo']['avatar'] = $path;
        

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }