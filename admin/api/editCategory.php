<?php 
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $id = $_POST['id'];


    require_once "tools/doSql.php";

    $sql = "update categories set name='$name',slug='$slug' where id = '$id' ";

    //执行
    $result = my_zsg($sql);

    if($result){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo ' { "code":10001, "msg":"fail" }';
    }