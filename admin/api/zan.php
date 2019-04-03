<?php 

    require_once "tools/doSql.php";

    //2个参数：要修改的赞数，文章的id
    //扩展部分：从安全的角度，应该只传文章id就行了
    //自己查出来数据库中原来的赞是多少，然后再自行的+
    // $newZan = $_POST['zan'];

    //拿到文章Id
    $id = $_POST['id'];

    //查出原来的赞数
    $sql = "select *from posts where id = $id";
    $data = my_select($sql)[0];
    $likes = $data['likes'];

    //自增一个
    $likes++;

    $sql = "update posts set likes = $likes where id = $id";


    $result = my_zsg($sql);

    if($result){

        echo $likes;
    }else{

        echo 'fail';
    }