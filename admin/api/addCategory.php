<?php 

    //接收提交过来的数据
    $slug = $_POST['slug'];
    $name = $_POST['name'];

    require_once "tools/doSql.php";

    $sql = "insert into categories(slug,name) values('$slug','$name')";

    $result = my_zsg($sql);

    if($result){

        echo ' { "code":10000, "msg":"ok" }';
    }else{

        echo ' { "code":10001, "msg":"fail" }';
    }