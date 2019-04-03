<?php
    //接收提交过来的数据
    $oldPass = $_POST['oldPass'];

    //先判断旧密码是否正确
    session_start();

    //用用户输入的旧密码 跟 我们取出保存的旧密码进行判断
    if( $oldPass != $_SESSION['userInfo']['password'] ){

        //代表用户输入旧密码错误，不让他往下修改
        echo '{ "code":10001, "msg":"旧密码核对失败！" }';
        return;
    }

    //能来到这，证明旧密码核对成功，核对成功就要修改成新密码
    $newPass = $_POST['newPass'];
    //取出当前登录的用户的id
    $id = $_SESSION['userInfo']['id'];

    //导入工具文件
    require_once "tools/doSql.php";
    $sql = "update users set password='$newPass' where id = '$id'";

    //执行数据库
    $result = my_zsg($sql);

    if($result){

        echo '{ "code":10000, "msg":"修改成功！" }';
    }else{

        echo '{ "code":10002, "msg":"修改失败！" }';
    }
    