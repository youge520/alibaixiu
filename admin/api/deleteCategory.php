<?php 
    $ids = $_POST['ids'];

    require_once "tools/doSql.php";

    $sql = "delete from categories where id in ($ids)";

    $result = my_zsg($sql);

    
    if($result){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10002, "msg":"fail" }';
    }
    